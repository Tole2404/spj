<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitKerjaSeeder extends Seeder
{
    public function run()
    {
        $unitKerjas = [
            // Sekretariat Jenderal
            ['kode_unit' => 'SETJEN-ORTALA', 'nama_unit' => 'Biro Organisasi dan Tata Laksana', 'unor_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['kode_unit' => 'SETJEN-KEUANGAN', 'nama_unit' => 'Biro Keuangan', 'unor_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['kode_unit' => 'SETJEN-HUKUM', 'nama_unit' => 'Biro Hukum', 'unor_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['kode_unit' => 'SETJEN-HUMAS', 'nama_unit' => 'Biro Komunikasi Publik', 'unor_id' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Inspektorat Jenderal
            ['kode_unit' => 'ITJEN-1', 'nama_unit' => 'Inspektorat I', 'unor_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['kode_unit' => 'ITJEN-2', 'nama_unit' => 'Inspektorat II', 'unor_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['kode_unit' => 'ITJEN-3', 'nama_unit' => 'Inspektorat III', 'unor_id' => 2, 'created_at' => now(), 'updated_at' => now()],

            // Ditjen SDA
            ['kode_unit' => 'SDA-TEKNIK', 'nama_unit' => 'Direktorat Teknik Keairan', 'unor_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['kode_unit' => 'SDA-SUNGAI', 'nama_unit' => 'Direktorat Bina Operasi dan Pemeliharaan Sungai', 'unor_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['kode_unit' => 'SDA-WADUK', 'nama_unit' => 'Direktorat Bina Operasi dan Pemeliharaan Waduk', 'unor_id' => 3, 'created_at' => now(), 'updated_at' => now()],

            // Ditjen Bina Marga
            ['kode_unit' => 'BM-JALAN', 'nama_unit' => 'Direktorat Jalan Bebas Hambatan', 'unor_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['kode_unit' => 'BM-JEMBATAN', 'nama_unit' => 'Direktorat Jembatan', 'unor_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['kode_unit' => 'BM-PEMELIHARAAN', 'nama_unit' => 'Direktorat Pemeliharaan Jalan', 'unor_id' => 4, 'created_at' => now(), 'updated_at' => now()],

            // Ditjen Cipta Karya
            ['kode_unit' => 'CK-PENYEHATAN', 'nama_unit' => 'Direktorat Penyehatan Lingkungan', 'unor_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['kode_unit' => 'CK-PENATAAN', 'nama_unit' => 'Direktorat Penataan Bangunan', 'unor_id' => 5, 'created_at' => now(), 'updated_at' => now()],

            // Ditjen Bina Konstruksi
            ['kode_unit' => 'BK-JASA', 'nama_unit' => 'Direktorat Bina Jasa Konstruksi', 'unor_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['kode_unit' => 'BK-KOMPETENSI', 'nama_unit' => 'Direktorat Bina Kompetensi dan Produktivitas', 'unor_id' => 6, 'created_at' => now(), 'updated_at' => now()],

            // BPSDM
            ['kode_unit' => 'BPSDM-DIKLAT', 'nama_unit' => 'Pusat Pendidikan dan Pelatihan', 'unor_id' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['kode_unit' => 'BPSDM-LITBANG', 'nama_unit' => 'Pusat Penelitian dan Pengembangan', 'unor_id' => 9, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('unit_kerjas')->insert($unitKerjas);
    }
}
