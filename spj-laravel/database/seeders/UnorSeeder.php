<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnorSeeder extends Seeder
{
    public function run()
    {
        $unors = [
            ['kode_unor' => 'SETJEN', 'nama_unor' => 'Sekretariat Jenderal', 'created_at' => now(), 'updated_at' => now()],
            ['kode_unor' => 'ITJEN', 'nama_unor' => 'Inspektorat Jenderal', 'created_at' => now(), 'updated_at' => now()],
            ['kode_unor' => 'DITJEN-SDA', 'nama_unor' => 'Direktorat Jenderal Sumber Daya Air', 'created_at' => now(), 'updated_at' => now()],
            ['kode_unor' => 'DITJEN-BM', 'nama_unor' => 'Direktorat Jenderal Bina Marga', 'created_at' => now(), 'updated_at' => now()],
            ['kode_unor' => 'DITJEN-CK', 'nama_unor' => 'Direktorat Jenderal Cipta Karya', 'created_at' => now(), 'updated_at' => now()],
            ['kode_unor' => 'DITJEN-BK', 'nama_unor' => 'Direktorat Jenderal Bina Konstruksi', 'created_at' => now(), 'updated_at' => now()],
            ['kode_unor' => 'DITJEN-PS', 'nama_unor' => 'Direktorat Jenderal Prasarana Strategis', 'created_at' => now(), 'updated_at' => now()],
            ['kode_unor' => 'DITJEN-PIPU', 'nama_unor' => 'Direktorat Jenderal Pembiayaan Infrastruktur Pekerjaan Umum', 'created_at' => now(), 'updated_at' => now()],
            ['kode_unor' => 'BPSDM', 'nama_unor' => 'Badan Pengembangan Sumber Daya Manusia', 'created_at' => now(), 'updated_at' => now()],
            ['kode_unor' => 'BPIW', 'nama_unor' => 'Badan Pengembangan Infrastruktur Wilayah', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('unors')->insert($unors);
    }
}
