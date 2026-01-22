<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaktuKonsumsi extends Model
{
    use HasFactory;

    protected $table = 'waktu_konsumsi';

    protected $fillable = [
        'nama_waktu',
        'kode_waktu',
    ];

    public function konsumsis()
    {
        return $this->hasMany(Konsumsi::class, 'waktu_konsumsi_id');
    }
}
