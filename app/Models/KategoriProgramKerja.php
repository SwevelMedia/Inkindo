<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProgramKerja extends Model
{
    use HasFactory;
    protected $table = 'kategori_program_kerja';
    protected $fillable = [
       'nama_kategori',
       'periode'
    ];
    public function program_kerja()
    {
        return $this->hasMany(ProgramKerja::class, 'kategori_id');
    }
}
