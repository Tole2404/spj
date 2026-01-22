<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WaktuKonsumsi;

class WaktuKonsumsiSeeder extends Seeder
{
    public function run(): void
    {
        $waktuKonsumsi = [
            ['nama_waktu' => 'Snack Pagi', 'kode_waktu' => 'snack_pagi'],
            ['nama_waktu' => 'Makan Pagi', 'kode_waktu' => 'makan_pagi'],
            ['nama_waktu' => 'Snack Siang', 'kode_waktu' => 'snack_siang'],
            ['nama_waktu' => 'Makan Siang', 'kode_waktu' => 'makan_siang'],
            ['nama_waktu' => 'Snack Sore', 'kode_waktu' => 'snack_sore'],
            ['nama_waktu' => 'Makan Sore/Malam', 'kode_waktu' => 'makan_sore'],
        ];

        foreach ($waktuKonsumsi as $waktu) {
            WaktuKonsumsi::create($waktu);
        }

        $this->command->info('Waktu Konsumsi seeder completed! ' . count($waktuKonsumsi) . ' records');
    }
}
