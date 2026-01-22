<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bendahara extends Model
{
    protected $fillable = [
        'nama',
        'jabatan',
        'gol_pangkat',
        'nip',
        'eselon',
        'tgl_lahir',
        'is_active',
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * Get kegiatans that use this bendahara
     */
    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }
}
