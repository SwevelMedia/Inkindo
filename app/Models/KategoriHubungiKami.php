<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriHubungiKami extends Model
{
    use HasFactory;
    protected $table = 'kategori_hubungi_kami';

    protected $fillable = ['nama_kategori'];

    public function program_kerja()
    {
        return $this->hasMany(HubungiKami::class, 'kategori_id');
    }
}
