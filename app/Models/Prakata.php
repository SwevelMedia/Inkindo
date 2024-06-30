<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prakata extends Model
{
    use HasFactory;
    protected $table = 'prakatas';

    protected $fillable = [
        'nama_prakata',
        'jabatan',
        'sambutan',
        'foto_prakata',
    ];
}
