<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortofolioGambar extends Model
{
    use HasFactory;

    protected $table = 'portofolio_gambars';
    protected $fillable = ['gambar', 'portofolio_id'];

    public function portofolio()
    {
        return $this->belongsTo(PortofolioAnggota::class,'portofolio_id');
    }
}
