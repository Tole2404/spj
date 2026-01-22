<?php

namespace App\Http\Controllers;

use App\Models\SatuanBiayaKonsumsiProvinsi;
use Illuminate\Http\Request;

class SBMKonsumsiController extends Controller
{
    public function index()
    {
        $sbm = SatuanBiayaKonsumsiProvinsi::orderBy('id_provinsi')->get();
        return view('master.sbm-konsumsi.index', compact('sbm'));
    }

    public function create()
    {
        return view('master.sbm-konsumsi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_provinsi' => 'required|integer',
            'nama_provinsi' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'harga_max_makan' => 'required|integer|min:0',
            'harga_max_snack' => 'required|integer|min:0',
            'tahun_anggaran' => 'required|integer',
        ]);

        SatuanBiayaKonsumsiProvinsi::create($validated);

        return redirect()->route('master.sbm-konsumsi.index')
            ->with('success', 'Data SBM Konsumsi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $sbm = SatuanBiayaKonsumsiProvinsi::findOrFail($id);
        return view('master.sbm-konsumsi.edit', compact('sbm'));
    }

    public function update(Request $request, $id)
    {
        $sbm = SatuanBiayaKonsumsiProvinsi::findOrFail($id);

        $validated = $request->validate([
            'id_provinsi' => 'required|integer',
            'nama_provinsi' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'harga_max_makan' => 'required|integer|min:0',
            'harga_max_snack' => 'required|integer|min:0',
            'tahun_anggaran' => 'required|integer',
        ]);

        $sbm->update($validated);

        return redirect()->route('master.sbm-konsumsi.index')
            ->with('success', 'Data SBM Konsumsi berhasil diupdate!');
    }

    public function destroy($id)
    {
        $sbm = SatuanBiayaKonsumsiProvinsi::findOrFail($id);
        $sbm->delete();

        return redirect()->route('master.sbm-konsumsi.index')
            ->with('success', 'Data SBM Konsumsi berhasil dihapus!');
    }
}

