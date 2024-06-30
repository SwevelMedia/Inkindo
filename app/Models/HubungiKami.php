<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HubungiKami extends Model
{
    use HasFactory;
    protected $table = 'hubungi_kami';

    protected $fillable = ['nama', 'kategori_id','email', 'pesan', 'status'];

    public function kategori()
    {
        return $this->belongsTo(KategoriHubungiKami::class, 'kategori_id');
    }
}
