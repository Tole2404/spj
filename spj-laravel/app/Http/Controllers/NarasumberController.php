<?php

namespace App\Http\Controllers;

use App\Models\Narasumber;
use App\Models\SBMHonorariumNarasumber;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class NarasumberController extends Controller
{
    /**
     * Show form to create narasumber for a specific kegiatan
     */
    public function create($kegiatan_id)
    {
        $kegiatan = Kegiatan::findOrFail($kegiatan_id);

        // Load all SBM Honorarium tarif
        $sbmHonorarium = SBMHonorariumNarasumber::orderBy('tarif_honorarium', 'desc')->get();

        return view('narasumber.create', compact('kegiatan', 'sbmHonorarium'));
    }

    /**
     * Store narasumber with SBM validation & PPh21 calculation
     */
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'nama_narasumber' => 'required|string|max:255',
            'jenis' => 'required|in:narasumber,moderator,pembawa_acara,panitia',
            'golongan_jabatan' => 'required|string',
            'npwp' => 'required|string|max:20',
            'tarif_pph21' => 'required|in:0,5,6,15',
            'honorarium_bruto' => 'required|integer|min:0',
        ]);

        // Get SBM tarif for validation
        $sbm = SBMHonorariumNarasumber::where('golongan_jabatan', $validated['golongan_jabatan'])->first();

        if (!$sbm) {
            return back()->withErrors(['golongan_jabatan' => 'Golongan jabatan tidak valid.'])->withInput();
        }

        // HARD VALIDATION: Honorarium bruto TIDAK BOLEH > tarif SBM
        if ($validated['honorarium_bruto'] > $sbm->tarif_honorarium) {
            return back()->withErrors([
                'honorarium_bruto' => 'Honorarium tidak boleh melebihi tarif SBM: Rp ' . number_format($sbm->tarif_honorarium, 0, ',', '.')
            ])->withInput();
        }

        // Calculate PPh21
        $tarif_persen = (int) $validated['tarif_pph21'];
        $pph21 = ($validated['honorarium_bruto'] * $tarif_persen) / 100;
        $honorarium_netto = $validated['honorarium_bruto'] - $pph21;

        // Save narasumber
        Narasumber::create([
            'kegiatan_id' => $validated['kegiatan_id'],
            'nama_narasumber' => $validated['nama_narasumber'],
            'jenis' => $validated['jenis'],
            'golongan_jabatan' => $validated['golongan_jabatan'],
            'npwp' => $validated['npwp'],
            'tarif_pph21' => $validated['tarif_pph21'],
            'honorarium_bruto' => $validated['honorarium_bruto'],
            'pph21' => $pph21,
            'honorarium_netto' => $honorarium_netto,
        ]);

        return redirect()->route('kegiatan.pilih-detail', $validated['kegiatan_id'])
            ->with('success', 'Narasumber berhasil ditambahkan');
    }

    /**
     * Delete narasumber
     */
    public function destroy($id)
    {
        $narasumber = Narasumber::findOrFail($id);
        $kegiatan_id = $narasumber->kegiatan_id;

        $narasumber->delete();

        return redirect()->route('kegiatan.pilih-detail', $kegiatan_id)
            ->with('success', 'Narasumber berhasil dihapus');
    }

    /**
     * Generate Daftar Hadir Narasumber (Attendance Sheet)
     */
    public function daftarHadir($kegiatan_id)
    {
        $kegiatan = Kegiatan::with(['unor', 'unitKerja'])->findOrFail($kegiatan_id);
        $narasumbers = Narasumber::where('kegiatan_id', $kegiatan_id)->get();

        return view('narasumber.daftar-hadir', compact('kegiatan', 'narasumbers'));
    }

    /**
     * Generate Daftar Honorarium (Payment List)
     */
    public function daftarHonorarium($kegiatan_id)
    {
        $kegiatan = Kegiatan::with(['unor', 'unitKerja'])->findOrFail($kegiatan_id);
        $narasumbers = Narasumber::where('kegiatan_id', $kegiatan_id)->get();
        $totalHonorarium = $narasumbers->sum('honorarium_netto');

        return view('narasumber.daftar-honorarium', compact('kegiatan', 'narasumbers', 'totalHonorarium'));
    }
}
