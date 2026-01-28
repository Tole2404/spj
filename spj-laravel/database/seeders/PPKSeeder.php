<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PPK;

class PPKSeeder extends Seeder
{
    public function run(): void
    {
        $ppkData = [
            [
                'nama' => 'Dini Rianti, S.E.',
                'nip' => '198010172005022001',
                'satker' => 'SEKRETARIAT BADAN PENGEMBANGAN SUMBER DAYA MANUSIA',
                'kdppk' => '02',
            ],
            [
                'nama' => 'Andi Firmansyah, M.M.',
                'nip' => '197505121998031002',
                'satker' => 'SEKRETARIAT BADAN PENGEMBANGAN SUMBER DAYA MANUSIA',
                'kdppk' => '01',
            ],
            [
                'nama' => 'Dr. Ir. Bambang Supriyanto, M.T.',
                'nip' => '196512101990031003',
                'satker' => 'PUSAT PENDIDIKAN DAN PELATIHAN',
                'kdppk' => '03',
            ],
            [
                'nama' => 'Drs. Hendra Kusuma, M.M.',
                'nip' => '197001151995121001',
                'satker' => 'PUSAT PENELITIAN DAN PENGEMBANGAN',
                'kdppk' => '04',
            ],
            [
                'nama' => 'Dr. Sri Wahyuni, S.T., M.Eng.',
                'nip' => '197508202000032001',
                'satker' => 'BALAI BESAR PENGEMBANGAN TEKNOLOGI',
                'kdppk' => '05',
            ],
        ];

        foreach ($ppkData as $ppk) {
            PPK::updateOrCreate(
                ['nip' => $ppk['nip']],
                $ppk
            );
        }

        $this->command->info('PPK seeder completed! ' . count($ppkData) . ' records created/updated.');
    }
}
