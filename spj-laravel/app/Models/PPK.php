<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPK extends Model
{
    use HasFactory;

    protected $table = 'ppk';

    protected $fillable = [
        'nama',
        'nip',
        'satker',
        'kdppk',
    ];
}
