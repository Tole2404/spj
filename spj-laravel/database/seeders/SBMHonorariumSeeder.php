<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SBMHonorariumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $honorariums = [
            // Honorarium Narasumber (4 golongan)
            [
                'golongan_jabatan' => 'Menteri/Pejabat Setingkat',
                'tarif_honorarium' => 1700000,
                'tahun_anggaran' => 2024,
                'keterangan' => 'Menteri/Pejabat Negara Lainnya/yang disetarakan',
            ],
            [
                'golongan_jabatan' => 'Pejabat Eselon I',
                'tarif_honorarium' => 1400000,
                'tahun_anggaran' => 2024,
                'keterangan' => 'Pejabat Eselon I/yang disetarakan',
            ],
            [
                'golongan_jabatan' => 'Pejabat Eselon II',
                'tarif_honorarium' => 1000000,
                'tahun_anggaran' => 2024,
                'keterangan' => 'Pejabat Eselon II/yang disetarakan',
            ],
            [
                'golongan_jabatan' => 'Pejabat Eselon III ke bawah',
                'tarif_honorarium' => 900000,
                'tahun_anggaran' => 2024,
                'keterangan' => 'Pejabat Eselon III ke bawah/yang disetarakan',
            ],
            // Honorarium Moderator
            [
                'golongan_jabatan' => 'Moderator',
                'tarif_honorarium' => 700000,
                'tahun_anggaran' => 2024,
                'keterangan' => 'Honorarium Moderator (Orang/Kali)',
            ],
            // Honorarium Pembawa Acara
            [
                'golongan_jabatan' => 'Pembawa Acara',
                'tarif_honorarium' => 400000,
                'tahun_anggaran' => 2024,
                'keterangan' => 'Honorarium Pembawa Acara (OK)',
            ],
            // Honorarium Panitia (4 sub golongan)
            [
                'golongan_jabatan' => 'Panitia Penanggung Jawab',
                'tarif_honorarium' => 450000,
                'tahun_anggaran' => 2024,
                'keterangan' => 'Honorarium Panitia - Penanggung Jawab (OK)',
            ],
            [
                'golongan_jabatan' => 'Panitia Ketua/Wakil Ketua',
                'tarif_honorarium' => 400000,
                'tahun_anggaran' => 2024,
                'keterangan' => 'Honorarium Panitia - Ketua/Wakil ketua (OK)',
            ],
            [
                'golongan_jabatan' => 'Panitia Sekretaris',
                'tarif_honorarium' => 300000,
                'tahun_anggaran' => 2024,
                'keterangan' => 'Honorarium Panitia - Sekretaris (OK)',
            ],
            [
                'golongan_jabatan' => 'Panitia Anggota',
                'tarif_honorarium' => 300000,
                'tahun_anggaran' => 2024,
                'keterangan' => 'Honorarium Panitia - Anggota (OK)',
            ],
        ];

        foreach ($honorariums as $honorarium) {
            \DB::table('sbm_honorarium_narasumber')->insertOrIgnore($honorarium);
        }

        echo "\nSBM Honorarium seeder completed! " . count($honorariums) . " golongan jabatan created.\n";
    }
}
