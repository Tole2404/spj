<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\WaktuKonsumsi;
use Illuminate\Http\Request;

class WaktuKonsumsiController extends Controller
{
    public function index(Request $request)
    {
        $query = WaktuKonsumsi::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_waktu', 'like', "%{$search}%")
                    ->orWhere('kode_waktu', 'like', "%{$search}%")
                    ->orWhere('tipe', 'like', "%{$search}%");
            });
        }

        $waktuKonsumsi = $query->orderBy('tipe')->orderBy('kode_waktu')->paginate(10)->withQueryString();
        return view('master.waktu-konsumsi.index', compact('waktuKonsumsi'));
    }

    public function create()
    {
        return view('master.waktu-konsumsi.create');
    }

    /**
     * Generate kode waktu otomatis berdasarkan tipe
     * WM01, WM02, ... untuk Makan
     * WS01, WS02, ... untuk Snack
     */
    private function generateKode($tipe)
    {
        $prefix = $tipe === 'snack' ? 'WS' : 'WM';

        // Cari kode terakhir dengan prefix ini
        $lastKode = WaktuKonsumsi::where('kode_waktu', 'like', $prefix . '%')
            ->orderBy('kode_waktu', 'desc')
            ->first();

        if ($lastKode) {
            // Extract angka dari kode terakhir
            $lastNumber = (int) substr($lastKode->kode_waktu, 2);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return $prefix . str_pad($newNumber, 2, '0', STR_PAD_LEFT);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_waktu' => 'required|string|max:255',
            'tipe' => 'required|in:makan,snack',
        ]);

        // Auto-generate kode
        $validated['kode_waktu'] = $this->generateKode($validated['tipe']);

        WaktuKonsumsi::create($validated);

        return redirect()->route('master.waktu-konsumsi.index')
            ->with('success', 'Waktu konsumsi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $waktuKonsumsi = WaktuKonsumsi::findOrFail($id);
        return view('master.waktu-konsumsi.edit', compact('waktuKonsumsi'));
    }

    public function update(Request $request, $id)
    {
        $waktuKonsumsi = WaktuKonsumsi::findOrFail($id);

        $validated = $request->validate([
            'nama_waktu' => 'required|string|max:255',
            'tipe' => 'required|in:makan,snack',
        ]);

        // Jika tipe berubah, generate kode baru
        if ($validated['tipe'] !== $waktuKonsumsi->tipe) {
            $validated['kode_waktu'] = $this->generateKode($validated['tipe']);
        }

        $waktuKonsumsi->update($validated);

        return redirect()->route('master.waktu-konsumsi.index')
            ->with('success', 'Waktu konsumsi berhasil diupdate!');
    }

    public function destroy($id)
    {
        $waktuKonsumsi = WaktuKonsumsi::findOrFail($id);
        $waktuKonsumsi->delete();

        return redirect()->route('master.waktu-konsumsi.index')
            ->with('success', 'Waktu konsumsi berhasil dihapus!');
    }
}
