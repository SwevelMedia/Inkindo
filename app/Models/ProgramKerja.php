<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{
    use HasFactory;
    protected $table = 'program_kerja';

    protected $fillable = [
        'nama_proker',
        'kategori_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getCreatedAtAttribute($value)
    {
        return date('d-m-Y H:i:s', strtotime($value));
    }
    public function kategoriProgramKerja()
    {
        return $this->belongsTo(KategoriProgramKerja::class);
    }
}
