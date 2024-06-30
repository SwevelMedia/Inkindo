<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganisasiLain extends Model
{
    use HasFactory;

    protected $table = 'organisasi_lains';

    protected $fillable = [
        'dewan_bidang',
        'nama_pengurus',
        'jabatan',
    ];
}
