<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Konsumsi;
use Illuminate\Http\Request;

class KwitansiController extends Controller
{
    /**
     * Show kwitansi preview page
     */
    public function generate(Request $request)
    {
        $kegiatanId = $request->get('kegiatan_id');
        $jenis = $request->get('jenis', 'UP'); // UP or LS

        $kegiatan = Kegiatan::with(['unor', 'unitKerja', 'mak', 'ppk'])->findOrFail($kegiatanId);

        // Get konsumsi data
        $konsumsis = Konsumsi::where('kegiatan_id', $kegiatanId)->get();
        $totalKonsumsi = $konsumsis->sum(fn($item) => $item->jumlah * $item->harga);

        // Generate terbilang
        $terbilang = $this->terbilang($totalKonsumsi);

        return view('kwitansi.preview', compact('kegiatan', 'konsumsis', 'totalKonsumsi', 'terbilang', 'jenis'));
    }

    /**
     * Download kwitansi as PDF
     */
    public function download($kegiatan_id, $jenis)
    {
        // TODO: Implement PDF generation
        // For now, redirect back with message
        return back()->with('info', 'Fitur download PDF dalam pengembangan');
    }

    /**
     * Show daftar hadir form
     */
    public function daftarHadir($id)
    {
        $kegiatan = Kegiatan::with(['unor', 'unitKerja'])->findOrFail($id);
        return view('kwitansi.daftar-hadir', compact('kegiatan'));
    }

    /**
     * Convert number to words in Indonesian
     */
    private function terbilang($angka)
    {
        $angka = abs($angka);
        $huruf = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];
        $temp = "";

        if ($angka < 12) {
            $temp = " " . $huruf[$angka];
        } else if ($angka < 20) {
            $temp = $this->terbilang($angka - 10) . " belas";
        } else if ($angka < 100) {
            $temp = $this->terbilang($angka / 10) . " puluh" . $this->terbilang($angka % 10);
        } else if ($angka < 200) {
            $temp = " seratus" . $this->terbilang($angka - 100);
        } else if ($angka < 1000) {
            $temp = $this->terbilang($angka / 100) . " ratus" . $this->terbilang($angka % 100);
        } else if ($angka < 2000) {
            $temp = " seribu" . $this->terbilang($angka - 1000);
        } else if ($angka < 1000000) {
            $temp = $this->terbilang($angka / 1000) . " ribu" . $this->terbilang($angka % 1000);
        } else if ($angka < 1000000000) {
            $temp = $this->terbilang($angka / 1000000) . " juta" . $this->terbilang($angka % 1000000);
        } else if ($angka < 1000000000000) {
            $temp = $this->terbilang($angka / 1000000000) . " milyar" . $this->terbilang(fmod($angka, 1000000000));
        }

        return $temp;
    }
}
