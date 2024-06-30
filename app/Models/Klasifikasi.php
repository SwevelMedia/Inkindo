<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    protected $table = 'klasifikasis';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    use HasFactory;

    public function anggota(){
        return $this->belongsToMany(Anggota::class,'klasifikasi_anggotas')->withTimestamps();
    }
}
