<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SatuanBiayaKonsumsiProvinsi;

class SBMKonsumsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tahun = date('Y');

        // Data SBM Konsumsi
        $data = [
            // Tingkat Menteri/Eselon 1
            ['id_provinsi' => 0, 'provinsi' => 'NASIONAL', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 118000, 'harga_max_snack' => 53000],

            // Rapat Biasa per Provinsi
            ['id_provinsi' => 1, 'provinsi' => 'ACEH', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 51000, 'harga_max_snack' => 21000],
            ['id_provinsi' => 2, 'provinsi' => 'SUMATRA UTARA', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 47000, 'harga_max_snack' => 17000],
            ['id_provinsi' => 3, 'provinsi' => 'RIAU', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 52000, 'harga_max_snack' => 18000],
            ['id_provinsi' => 4, 'provinsi' => 'KEPULAUAN RIAU', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 44000, 'harga_max_snack' => 25000],
            ['id_provinsi' => 5, 'provinsi' => 'JAMBI', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 54000, 'harga_max_snack' => 19000],
            ['id_provinsi' => 6, 'provinsi' => 'SUMATRA BARAT', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 45000, 'harga_max_snack' => 19000],
            ['id_provinsi' => 7, 'provinsi' => 'SUMATRA SELATAN', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 63000, 'harga_max_snack' => 19000],
            ['id_provinsi' => 8, 'provinsi' => 'LAMPUNG', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 43000, 'harga_max_snack' => 21000],
            ['id_provinsi' => 9, 'provinsi' => 'BENGKULU', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 48000, 'harga_max_snack' => 16000],
            ['id_provinsi' => 10, 'provinsi' => 'BANGKA BELITUNG', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 48000, 'harga_max_snack' => 19000],
            ['id_provinsi' => 11, 'provinsi' => 'BANTEN', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 54000, 'harga_max_snack' => 21000],
            ['id_provinsi' => 12, 'provinsi' => 'JAWA BARAT', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 54000, 'harga_max_snack' => 22000],
            ['id_provinsi' => 13, 'provinsi' => 'DKI JAKARTA', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 57000, 'harga_max_snack' => 24000],
            ['id_provinsi' => 14, 'provinsi' => 'JAWA TENGAH', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 69000, 'harga_max_snack' => 17000],
            ['id_provinsi' => 15, 'provinsi' => 'DI YOGYAKARTA', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 59000, 'harga_max_snack' => 17000],
            ['id_provinsi' => 16, 'provinsi' => 'JAWA TIMUR', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 49000, 'harga_max_snack' => 23000],
            ['id_provinsi' => 17, 'provinsi' => 'BALI', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 52000, 'harga_max_snack' => 22000],
            ['id_provinsi' => 18, 'provinsi' => 'NUSA TENGGARA BARAT', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 51000, 'harga_max_snack' => 19000],
            ['id_provinsi' => 19, 'provinsi' => 'NUSA TENGGARA TIMUR', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 52000, 'harga_max_snack' => 22000],
            ['id_provinsi' => 20, 'provinsi' => 'KALIMANTAN BARAT', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 51000, 'harga_max_snack' => 17000],
            ['id_provinsi' => 21, 'provinsi' => 'KALIMANTAN TENGAH', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 42000, 'harga_max_snack' => 16000],
            ['id_provinsi' => 22, 'provinsi' => 'KALIMANTAN SELATAN', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 51000, 'harga_max_snack' => 18000],
            ['id_provinsi' => 23, 'provinsi' => 'KALIMANTAN TIMUR', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 48000, 'harga_max_snack' => 27000],
            ['id_provinsi' => 24, 'provinsi' => 'KALIMANTAN UTARA', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 53000, 'harga_max_snack' => 22000],
            ['id_provinsi' => 25, 'provinsi' => 'SULAWESI UTARA', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 59000, 'harga_max_snack' => 27000],
            ['id_provinsi' => 26, 'provinsi' => 'GORONTALO', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 45000, 'harga_max_snack' => 16000],
            ['id_provinsi' => 27, 'provinsi' => 'SULAWESI BARAT', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 54000, 'harga_max_snack' => 22000],
            ['id_provinsi' => 28, 'provinsi' => 'SULAWESI SELATAN', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 59000, 'harga_max_snack' => 26000],
            ['id_provinsi' => 29, 'provinsi' => 'SULAWESI TENGAH', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 48000, 'harga_max_snack' => 19000],
            ['id_provinsi' => 30, 'provinsi' => 'SULAWESI TENGGARA', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 49000, 'harga_max_snack' => 22000],
            ['id_provinsi' => 31, 'provinsi' => 'MALUKU', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 64000, 'harga_max_snack' => 25000],
            ['id_provinsi' => 32, 'provinsi' => 'MALUKU UTARA', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 63000, 'harga_max_snack' => 26000],
            ['id_provinsi' => 33, 'provinsi' => 'PAPUA', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 62000, 'harga_max_snack' => 33000],
            ['id_provinsi' => 34, 'provinsi' => 'PAPUA BARAT', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 62000, 'harga_max_snack' => 28000],
            ['id_provinsi' => 35, 'provinsi' => 'PAPUA BARAT DAYA', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 62000, 'harga_max_snack' => 28000],
            ['id_provinsi' => 36, 'provinsi' => 'PAPUA TENGAH', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 62000, 'harga_max_snack' => 33000],
            ['id_provinsi' => 37, 'provinsi' => 'PAPUA SELATAN', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 92000, 'harga_max_snack' => 49000],
            ['id_provinsi' => 38, 'provinsi' => 'PAPUA PEGUNUNGAN', 'satuan' => 'Orang/Kali', 'harga_max_makan' => 93000, 'harga_max_snack' => 42000],
        ];

        foreach ($data as $item) {
            SatuanBiayaKonsumsiProvinsi::create([
                'id_provinsi' => $item['id_provinsi'],
                'nama_provinsi' => $item['provinsi'],
                'satuan' => $item['satuan'],
                'harga_max_makan' => $item['harga_max_makan'],
                'harga_max_snack' => $item['harga_max_snack'],
                'tahun_anggaran' => $tahun,
            ]);
        }

        $this->command->info('SBM Konsumsi seeder completed! 39 records inserted.');
    }
}
