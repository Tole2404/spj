<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MAK extends Model
{
    use HasFactory;

    protected $table = 'mak';

    protected $fillable = [
        'tahun',
        'nama',
        'kode',
        'satker',
        'akun',
        'paket',
    ];

    // Relationships bisa ditambahkan nanti jika ada
    // public function konsumsis()
    // {
    //     return $this->hasMany(Konsumsi::class, 'mak_id');
    // }
}
