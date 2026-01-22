<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MAK;

class MAKSeeder extends Seeder
{
    public function run(): void
    {
        $makData = [
            [
                'tahun' => 2026,
                'nama' => 'Evaluasi Pelaksanaan Kegiatan - Belanja Perjalanan Dinas Biasa',
                'kode' => '12.694431.WA.7770.EBD.Z24.100.A-524111',
                'satker' => 'SEKRETARIAT BADAN PENGEMBANGAN SUMBER DAYA MANUSIA',
                'akun' => 'Belanja Perjalanan Dinas Biasa',
                'paket' => 'Evaluasi Pelaksanaan Kegiatan',
            ],
            [
                'tahun' => 2026,
                'nama' => 'Rapat Koordinasi - Belanja Barang Konsumsi',
                'kode' => '12.694431.WA.7770.RAK.Z24.101.B-521211',
                'satker' => 'SEKRETARIAT BADAN PENGEMBANGAN SUMBER DAYA MANUSIA',
                'akun' => 'Belanja Barang Konsumsi',
                'paket' => 'Rapat Koordinasi',
            ],
            [
                'tahun' => 2026,
                'nama' => 'Workshop Pelatihan - Belanja Jasa Profesi',
                'kode' => '12.694431.WA.7770.WKS.Z24.102.C-522151',
                'satker' => 'SEKRETARIAT BADAN PENGEMBANGAN SUMBER DAYA MANUSIA',
                'akun' => 'Belanja Jasa Profesi',
                'paket' => 'Workshop Pelatihan',
            ],
        ];

        foreach ($makData as $mak) {
            MAK::create($mak);
        }

        $this->command->info('MAK seeder completed! ' . count($makData) . ' records created.');
    }
}
