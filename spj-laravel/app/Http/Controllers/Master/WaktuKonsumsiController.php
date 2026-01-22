<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\WaktuKonsumsi;
use Illuminate\Http\Request;

class WaktuKonsumsiController extends Controller
{
    public function index()
    {
        $waktuKonsumsi = WaktuKonsumsi::all();
        return view('master.waktu-konsumsi.index', compact('waktuKonsumsi'));
    }

    public function create()
    {
        return view('master.waktu-konsumsi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_waktu' => 'required|string|max:255',
            'kode_waktu' => 'required|string|max:20|unique:waktu_konsumsi',
        ]);

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
            'kode_waktu' => 'required|string|max:20|unique:waktu_konsumsi,kode_waktu,' . $id,
        ]);

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
