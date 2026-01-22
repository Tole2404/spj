<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class HonorariumController extends Controller
{
    /**
     * Show the form for creating honorarium.
     */
    public function create($kegiatan_id)
    {
        $kegiatan = Kegiatan::findOrFail($kegiatan_id);
        return view('honorarium.create', compact('kegiatan'));
    }

    /**
     * Store honorarium data.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_kegiatan' => 'required|exists:kegiatan,id',
            'nama_narasumber' => 'required|string|max:255',
            'jenis_honorarium' => 'required|string',
            'jumlah_jam' => 'required|integer|min:1',
            'tarif_per_jam' => 'required|integer|min:0',
        ]);

        // Untuk sementara redirect ke generate kwitansi LS
        return redirect()->route('kwitansi.generate', [
            'kegiatan_id' => $validated['id_kegiatan'],
            'jenis' => 'LS'
        ])->with('success', 'Data honorarium berhasil disimpan! Silakan generate kwitansi LS.');
    }
}
