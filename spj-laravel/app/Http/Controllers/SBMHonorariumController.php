<?php

namespace App\Http\Controllers;

use App\Models\SBMHonorariumNarasumber;
use Illuminate\Http\Request;

class SBMHonorariumController extends Controller
{
    /**
     * Show list of SBM Honorarium tarif
     */
    public function index(Request $request)
    {
        $query = SBMHonorariumNarasumber::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('golongan_jabatan', 'like', "%{$search}%")
                    ->orWhere('keterangan', 'like', "%{$search}%");
            });
        }

        $sbmHonorarium = $query->orderBy('tarif_honorarium', 'desc')->paginate(15)->withQueryString();

        return view('master.sbm-honorarium.index', compact('sbmHonorarium'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('master.sbm-honorarium.create');
    }

    /**
     * Store new SBM Honorarium
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'golongan_jabatan' => 'required|string|max:255',
            'tarif_honorarium' => 'required|integer|min:0',
            'tahun_anggaran' => 'required|integer',
            'keterangan' => 'nullable|string|max:255',
        ]);

        SBMHonorariumNarasumber::create($validated);

        return redirect()->route('master.sbm-honorarium.index')
            ->with('success', 'Data SBM Honorarium berhasil ditambahkan!');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $sbm = SBMHonorariumNarasumber::findOrFail($id);
        return view('master.sbm-honorarium.edit', compact('sbm'));
    }

    /**
     * Update SBM Honorarium tarif
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'golongan_jabatan' => 'required|string|max:255',
            'tarif_honorarium' => 'required|integer|min:0',
            'tahun_anggaran' => 'required|integer',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $sbm = SBMHonorariumNarasumber::findOrFail($id);
        $sbm->update($validated);

        return redirect()->route('master.sbm-honorarium.index')
            ->with('success', 'Data SBM Honorarium berhasil diupdate!');
    }

    /**
     * Delete SBM Honorarium
     */
    public function destroy($id)
    {
        $sbm = SBMHonorariumNarasumber::findOrFail($id);
        $sbm->delete();

        return redirect()->route('master.sbm-honorarium.index')
            ->with('success', 'Data SBM Honorarium berhasil dihapus!');
    }
}
