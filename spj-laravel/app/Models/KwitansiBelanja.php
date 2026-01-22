<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KwitansiBelanja extends Model
{
    use HasFactory;

    protected $table = 'kwitansi_belanja';

    protected $fillable = [
        'id_kegiatan',
        'nomor_kwitansi',
        'jumlah',
        'harga',
        'tanggal_pembelian',
        'jenis_kwitansi',
        'total_biaya',
    ];

    protected $casts = [
        'tanggal_pembelian' => 'datetime',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan');
    }
}
