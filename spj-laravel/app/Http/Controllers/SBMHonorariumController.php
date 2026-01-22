<?php

namespace App\Http\Controllers;

use App\Models\SBMHonorariumNarasumber;
use Illuminate\Http\Request;

class SBMHonorariumController extends Controller
{
    /**
     * Show list of SBM Honorarium tarif (Super Admin only)
     */
    public function index()
    {
        $sbmHonorarium = SBMHonorariumNarasumber::orderBy('tarif_honorarium', 'desc')->get();

        return view('master.sbm-honorarium.index', compact('sbmHonorarium'));
    }

    /**
     * Update SBM Honorarium tarif (Super Admin only)
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tarif_honorarium' => 'required|integer|min:0',
        ]);

        $sbm = SBMHonorariumNarasumber::findOrFail($id);
        $sbm->update($validated);

        return redirect()->route('master.sbm-honorarium')
            ->with('success', 'Tarif SBM Honorarium berhasil diupdate');
    }
}
