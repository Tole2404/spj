<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unor;
use App\Models\UnitKerja;
use App\Models\SatuanBiayaKonsumsiProvinsi;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Unor
        $unor1 = Unor::create([
            'nama_unor' => 'Badan Kepegawaian Negara',
            'lokasi' => 'Jakarta',
            'id_provinsi' => 1,
        ]);

        $unor2 = Unor::create([
            'nama_unor' => 'Kantor Regional I BKN',
            'lokasi' => 'Medan',
            'id_provinsi' => 2,
        ]);

        // Seed Unit Kerja
        UnitKerja::create([
            'nama_unker' => 'Bidang Pengembangan SDM',
            'lokasi' => 'Jakarta Pusat',
            'id_provinsi' => 1,
            'id_unor' => $unor1->id,
        ]);

        UnitKerja::create([
            'nama_unker' => 'Bidang Pelatihan dan Pengembangan',
            'lokasi' => 'Medan',
            'id_provinsi' => 2,
            'id_unor' => $unor2->id,
        ]);

        UnitKerja::create([
            'nama_unker' => 'Bidang Administrasi Kepegawaian',
            'lokasi' => 'Jakarta Selatan',
            'id_provinsi' => 1,
            'id_unor' => $unor1->id,
        ]);

        // Seed SBM Konsumsi Provinsi (39 records)
        $this->call(SBMKonsumsiSeeder::class);

        $this->command->info('Database seeder completed successfully!');
    }
}
