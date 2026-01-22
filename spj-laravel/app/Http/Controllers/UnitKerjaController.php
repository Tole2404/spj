<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use App\Models\Unor;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    public function index(Request $request)
    {
        $query = UnitKerja::with('unor');

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode_unit', 'like', "%{$search}%")
                    ->orWhere('nama_unit', 'like', "%{$search}%")
                    ->orWhereHas('unor', function ($q2) use ($search) {
                        $q2->where('nama_unor', 'like', "%{$search}%");
                    });
            });
        }

        // Filter by Unor
        if ($request->has('unor_id') && $request->unor_id != '') {
            $query->where('unor_id', $request->unor_id);
        }

        $unitKerjas = $query->orderBy('kode_unit')->paginate(10);
        $unors = Unor::orderBy('nama_unor')->get();

        return view('master.unit-kerja.index', compact('unitKerjas', 'unors'));
    }

    public function create()
    {
        $unors = Unor::orderBy('nama_unor')->get();
        return view('master.unit-kerja.create', compact('unors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_unit' => 'required|unique:unit_kerjas,kode_unit|max:50',
            'nama_unit' => 'required|max:255',
            'unor_id' => 'required|exists:unors,id',
        ]);

        UnitKerja::create($validated);

        return redirect()->route('master.unit-kerja.index')
            ->with('success', 'Unit Kerja berhasil ditambahkan');
    }

    public function edit(UnitKerja $unitKerja)
    {
        $unors = Unor::orderBy('nama_unor')->get();
        return view('master.unit-kerja.edit', compact('unitKerja', 'unors'));
    }

    public function update(Request $request, UnitKerja $unitKerja)
    {
        $validated = $request->validate([
            'kode_unit' => 'required|max:50|unique:unit_kerjas,kode_unit,' . $unitKerja->id,
            'nama_unit' => 'required|max:255',
            'unor_id' => 'required|exists:unors,id',
        ]);

        $unitKerja->update($validated);

        return redirect()->route('master.unit-kerja.index')
            ->with('success', 'Unit Kerja berhasil diperbarui');
    }

    public function destroy(UnitKerja $unitKerja)
    {
        $unitKerja->delete();

        return redirect()->route('master.unit-kerja.index')
            ->with('success', 'Unit Kerja berhasil dihapus');
    }
}
