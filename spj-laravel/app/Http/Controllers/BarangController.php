<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\KwitansiBelanja;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Show the form for creating barang.
     */
    public function create($kegiatan_id)
    {
        $kegiatan = Kegiatan::findOrFail($kegiatan_id);
        return view('barang.create', compact('kegiatan'));
    }

    /**
     * Store barang (Pagu Snack + Makan, ATK, Seminar Kit).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_kegiatan' => 'required|exists:kegiatan,id',
            'pagu_snack_makan' => 'required|integer|min:0',
            'atk' => 'required|integer|min:0',
            'seminar_kit' => 'required|integer|min:0',
        ]);

        $kegiatan_id = $validated['id_kegiatan'];
        $total_biaya = $validated['pagu_snack_makan'] + $validated['atk'] + $validated['seminar_kit'];

        // Simpan ke kwitansi_belanja
        KwitansiBelanja::create([
            'id_kegiatan' => $kegiatan_id,
            'nomor_kwitansi' => 'KWT-' . time(),
            'total_biaya' => $total_biaya,
            'tanggal_pembelian' => now(),
            'jenis_kwitansi' => 'UP',
        ]);

        return redirect()->route('kwitansi.generate', ['kegiatan_id' => $kegiatan_id, 'jenis' => 'UP'])
            ->with('success', 'Data barang berhasil disimpan! Silakan generate kwitansi.');
    }
}
