<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bendahara;

class BendaharaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bendaharas = [
            [
                'nama' => 'Drs. Ahmad Zainal, M.M.',
                'jabatan' => 'Bendahara Pengeluaran',
                'gol_pangkat' => 'III/d - Penata Tingkat I',
                'nip' => '196805151993031002',
                'eselon' => 'IV/a',
                'tgl_lahir' => '1968-05-15',
                'is_active' => true,
            ],
            [
                'nama' => 'Siti Nurhaliza, S.E.',
                'jabatan' => 'Bendahara Pengeluaran Pembantu',
                'gol_pangkat' => 'III/c - Penata',
                'nip' => '198703202010012005',
                'eselon' => null,
                'tgl_lahir' => '1987-03-20',
                'is_active' => true,
            ],
            [
                'nama' => 'Budi Santoso, S.Ak.',
                'jabatan' => 'Bendahara Pengeluaran Pembantu',
                'gol_pangkat' => 'III/b - Penata Muda Tingkat I',
                'nip' => '199001102015011001',
                'eselon' => null,
                'tgl_lahir' => '1990-01-10',
                'is_active' => true,
            ],
            [
                'nama' => 'Ratna Dewi, S.E., M.Ak.',
                'jabatan' => 'Bendahara Pengeluaran',
                'gol_pangkat' => 'III/d - Penata Tingkat I',
                'nip' => '197506251998032001',
                'eselon' => 'IV/a',
                'tgl_lahir' => '1975-06-25',
                'is_active' => false,
            ],
            [
                'nama' => 'Muhammad Rizki, A.Md.',
                'jabatan' => 'Bendahara Pengeluaran Pembantu',
                'gol_pangkat' => 'II/d - Pengatur Tingkat I',
                'nip' => '199505152019011002',
                'eselon' => null,
                'tgl_lahir' => '1995-05-15',
                'is_active' => true,
            ],
        ];

        foreach ($bendaharas as $bendahara) {
            Bendahara::updateOrCreate(
                ['nip' => $bendahara['nip']],
                $bendahara
            );
        }

        $this->command->info('Bendahara seeder completed: ' . count($bendaharas) . ' records.');
    }
}
