<?php

namespace App\Http\Controllers;

use App\Models\Bendahara;
use Illuminate\Http\Request;

class BendaharaController extends Controller
{
    /**
     * Display a listing of bendahara.
     */
    public function index()
    {
        $bendaharas = Bendahara::orderBy('nama')->get();
        return view('master.bendahara.index', compact('bendaharas'));
    }

    /**
     * Show the form for creating a new bendahara.
     */
    public function create()
    {
        return view('master.bendahara.create');
    }

    /**
     * Store a newly created bendahara in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'gol_pangkat' => 'nullable|string|max:50',
            'nip' => 'required|string|max:50|unique:bendaharas,nip',
            'eselon' => 'nullable|string|max:50',
            'tgl_lahir' => 'nullable|date',
        ]);

        Bendahara::create($validated);

        return redirect()->route('master.bendahara.index')
            ->with('success', 'Bendahara berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified bendahara.
     */
    public function edit($id)
    {
        $bendahara = Bendahara::findOrFail($id);
        return view('master.bendahara.edit', compact('bendahara'));
    }

    /**
     * Update the specified bendahara in storage.
     */
    public function update(Request $request, $id)
    {
        $bendahara = Bendahara::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'gol_pangkat' => 'nullable|string|max:50',
            'nip' => 'required|string|max:50|unique:bendaharas,nip,' . $id,
            'eselon' => 'nullable|string|max:50',
            'tgl_lahir' => 'nullable|date',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $bendahara->update($validated);

        return redirect()->route('master.bendahara.index')
            ->with('success', 'Bendahara berhasil diupdate');
    }

    /**
     * Remove the specified bendahara from storage.
     */
    public function destroy($id)
    {
        $bendahara = Bendahara::findOrFail($id);
        $bendahara->delete();

        return redirect()->route('master.bendahara.index')
            ->with('success', 'Bendahara berhasil dihapus');
    }
}
