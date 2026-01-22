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
        ];

        foreach ($ppkData as $ppk) {
            PPK::create($ppk);
        }

        $this->command->info('PPK seeder completed! ' . count($ppkData) . ' records created.');
    }
}
