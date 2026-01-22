<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;

    protected $table = 'unit_kerjas';

    protected $fillable = [
        'kode_unit',
        'nama_unit',
        'unor_id',
    ];

    public function unor()
    {
        return $this->belongsTo(Unor::class, 'unor_id');
    }

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class, 'unit_kerja_id');
    }
}
