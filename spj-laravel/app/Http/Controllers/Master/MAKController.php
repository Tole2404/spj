<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\MAK;
use Illuminate\Http\Request;

class MAKController extends Controller
{
    public function index(Request $request)
    {
        $query = MAK::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%")
                    ->orWhere('satker', 'like', "%{$search}%");
            });
        }

        // Filter by tahun
        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        $makData = $query->latest()->paginate(15);
        $tahunList = MAK::selectRaw('DISTINCT tahun')->orderBy('tahun', 'desc')->pluck('tahun');

        return view('master.mak.index', compact('makData', 'tahunList'));
    }

    public function create()
    {
        return view('master.mak.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun' => 'required|integer|min:2020|max:2100',
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:255|unique:mak,kode',
            'satker' => 'required|string|max:255',
            'akun' => 'required|string|max:255',
            'paket' => 'required|string|max:255',
        ]);

        MAK::create($validated);

        return redirect()->route('master.mak.index')
            ->with('success', 'Data MAK berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $mak = MAK::findOrFail($id);
        return view('master.mak.edit', compact('mak'));
    }

    public function update(Request $request, $id)
    {
        $mak = MAK::findOrFail($id);

        $validated = $request->validate([
            'tahun' => 'required|integer|min:2020|max:2100',
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:255|unique:mak,kode,' . $id,
            'satker' => 'required|string|max:255',
            'akun' => 'required|string|max:255',
            'paket' => 'required|string|max:255',
        ]);

        $mak->update($validated);

        return redirect()->route('master.mak.index')
            ->with('success', 'Data MAK berhasil diupdate!');
    }

    public function destroy($id)
    {
        $mak = MAK::findOrFail($id);
        $mak->delete();

        return redirect()->route('master.mak.index')
            ->with('success', 'Data MAK berhasil dihapus!');
    }
}
