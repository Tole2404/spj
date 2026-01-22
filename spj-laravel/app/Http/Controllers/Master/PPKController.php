<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\PPK;
use Illuminate\Http\Request;

class PPKController extends Controller
{
    public function index(Request $request)
    {
        $query = PPK::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nip', 'like', "%{$search}%")
                    ->orWhere('satker', 'like', "%{$search}%")
                    ->orWhere('kdppk', 'like', "%{$search}%");
            });
        }

        $ppkData = $query->latest()->paginate(15);

        return view('master.ppk.index', compact('ppkData'));
    }

    public function create()
    {
        return view('master.ppk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:ppk,nip',
            'satker' => 'required|string|max:255',
            'kdppk' => 'required|string|max:10',
        ]);

        PPK::create($validated);

        return redirect()->route('master.ppk.index')
            ->with('success', 'Data PPK berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $ppk = PPK::findOrFail($id);
        return view('master.ppk.edit', compact('ppk'));
    }

    public function update(Request $request, $id)
    {
        $ppk = PPK::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:ppk,nip,' . $id,
            'satker' => 'required|string|max:255',
            'kdppk' => 'required|string|max:10',
        ]);

        $ppk->update($validated);

        return redirect()->route('master.ppk.index')
            ->with('success', 'Data PPK berhasil diupdate!');
    }

    public function destroy($id)
    {
        $ppk = PPK::findOrFail($id);
        $ppk->delete();

        return redirect()->route('master.ppk.index')
            ->with('success', 'Data PPK berhasil dihapus!');
    }
}
