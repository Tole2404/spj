<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Unor;
use App\Models\UnitKerja;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of kegiatan.
     */
    public function index(Request $request)
    {
        $query = Kegiatan::with(['unor', 'unitKerja']);

        // Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nama_kegiatan', 'like', "%{$search}%");
        }

        // Filter by Unor
        if ($request->has('unor_id') && $request->unor_id != '') {
            $query->where('unor_id', $request->unor_id);
        }

        // Filter by Periode (month)
        if ($request->has('periode') && $request->periode != '') {
            $periode = $request->periode; // Format: YYYY-MM
            $query->whereYear('tanggal_mulai', substr($periode, 0, 4))
                ->whereMonth('tanggal_mulai', substr($periode, 5, 2));
        }

        $kegiatans = $query->latest()->paginate(10);
        $unors = Unor::orderBy('nama_unor')->get();

        return view('kegiatan.index', compact('kegiatans', 'unors'));
    }

    /**
     * Show the form for creating a new kegiatan.
     */
    public function create()
    {
        $unors = Unor::all();
        $unitKerjas = UnitKerja::all();
        $makData = \App\Models\MAK::orderBy('tahun', 'desc')->orderBy('nama')->get();
        $ppkData = \App\Models\PPK::orderBy('nama')->get();
        $bendaharaData = \App\Models\Bendahara::where('is_active', true)->orderBy('nama')->get();
        $provinsiData = \App\Models\SatuanBiayaKonsumsiProvinsi::orderBy('nama_provinsi')->get();
        return view('kegiatan.create', compact('unors', 'unitKerjas', 'makData', 'ppkData', 'bendaharaData', 'provinsiData'));
    }

    /**
     * Store a newly created kegiatan in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'unor_id' => 'required|exists:unors,id',
            'unit_kerja_id' => 'required|exists:unit_kerjas,id',
            'mak_id' => 'required|exists:mak,id',
            'ppk_id' => 'required|exists:ppk,id',
            'bendahara_id' => 'nullable|exists:bendaharas,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'jumlah_peserta' => 'required|integer|min:1',
            'provinsi_id' => 'required|exists:satuan_biaya_konsumsi_provinsi,id',
            'detail_lokasi' => 'required|string|max:255',
            'file_laporan' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        if ($request->hasFile('file_laporan')) {
            $validated['file_laporan'] = $request->file('file_laporan')
                ->store('laporan_kegiatan', 'public');
        }

        $kegiatan = Kegiatan::create($validated);

        return redirect()->route('kegiatan.pilih-detail', $kegiatan->id)
            ->with('success', 'Kegiatan berhasil dibuat! Silakan pilih jenis detail.');
    }

    /**
     * Display the specified kegiatan.
     */
    public function show(string $id)
    {
        $kegiatan = Kegiatan::with(['unor', 'unitKerja', 'konsumsis', 'kwitansiBelanjas'])->findOrFail($id);
        return view('kegiatan.show', compact('kegiatan'));
    }

    /**
     * Halaman detail kegiatan: Menampilkan konsumsi dan form input
     */
    public function pilihDetail(string $id)
    {
        $kegiatan = Kegiatan::with(['unor', 'unitKerja'])->findOrFail($id);

        // Get konsumsi grouped by kategori
        // Exclude draft items from the detail view
        $snacks = \App\Models\Konsumsi::where('kegiatan_id', $id)
            ->where('kategori', 'snack')
            ->where('status', '!=', 'draft')
            ->get();
        $makanans = \App\Models\Konsumsi::where('kegiatan_id', $id)
            ->where('kategori', 'makanan')
            ->where('status', '!=', 'draft')
            ->get();

        // Get narasumber
        $narasumbers = \App\Models\Narasumber::where('kegiatan_id', $id)->get();

        // Calculate totals
        $totalSnack = $snacks->sum(fn($item) => $item->jumlah * $item->harga);
        $totalMakanan = $makanans->sum(fn($item) => $item->jumlah * $item->harga);
        $totalHonorarium = $narasumbers->sum('honorarium_netto');
        $grandTotal = $totalSnack + $totalMakanan + $totalHonorarium;

        return view('kegiatan.pilih-detail', compact(
            'kegiatan',
            'snacks',
            'makanans',
            'narasumbers',
            'totalSnack',
            'totalMakanan',
            'totalHonorarium',
            'grandTotal'
        ));
    }

    /**
     * Show the form for editing the specified kegiatan.
     */
    public function edit(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $unor = Unor::all();
        $unitKerja = UnitKerja::all();
        return view('kegiatan.edit', compact('kegiatan', 'unor', 'unitKerja'));
    }

    /**
     * Update the specified kegiatan in storage.
     */
    public function update(Request $request, string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'id_unor' => 'nullable|exists:unor,id',
            'id_unit' => 'nullable|exists:unit_kerja,id',
            'tanggal_kegiatan' => 'nullable|date',
            'tanggal_berakhir' => 'nullable|date',
            'file_laporan_kegiatan' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        if ($request->hasFile('file_laporan_kegiatan')) {
            $validated['file_laporan_kegiatan'] = $request->file('file_laporan_kegiatan')
                ->store('laporan_kegiatan', 'public');
        }

        $kegiatan->update($validated);

        return redirect()->route('kegiatan.show', $kegiatan->id)
            ->with('success', 'Kegiatan berhasil diupdate!');
    }

    /**
     * Remove the specified kegiatan from storage.
     */
    public function destroy(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan berhasil dihapus!');
    }
}
