<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganisasiDpp extends Model
{
    use HasFactory;

    protected $table = 'organisasi_dpps';

    protected $fillable = [
        'nama_pengurus',
        'jabatan',
        'bidang_jabatan',
        'foto',
    ];
}
