<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SBMHonorariumNarasumber extends Model
{
    protected $table = 'sbm_honorarium_narasumber';

    protected $fillable = [
        'golongan_jabatan',
        'tarif_honorarium',
        'tahun_anggaran',
        'keterangan',
    ];

    protected $casts = [
        'tarif_honorarium' => 'integer',
        'tahun_anggaran' => 'integer',
    ];

    /**
     * Relationship: SBM Honorarium has many Narasumbers
     */
    public function narasumbers()
    {
        return $this->hasMany(Narasumber::class, 'golongan_jabatan', 'golongan_jabatan');
    }
}
