<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanBiayaKonsumsiProvinsi extends Model
{
    use HasFactory;

    protected $table = 'satuan_biaya_konsumsi_provinsi';

    protected $fillable = [
        'id_provinsi',
        'nama_provinsi',
        'satuan',
        'harga_max_makan',
        'harga_max_snack',
        'tahun_anggaran',
    ];
}
