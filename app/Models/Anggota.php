<?php

namespace App\Models;

use App\Models\Klasifikasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggotas';
    protected $guarded = ['id', 'user_id', 'created_at', 'updated_at'];

    public function klasifikasi()
    {
        return $this->belongsToMany(Klasifikasi::class, 'klasifikasi_anggotas')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function portofolio()
    // {
    //     return $this->hasMany(Portofolio::class);
    // }

    public function portofolio()
    {
        return $this->hasMany(PortofolioAnggota::class);
    }

    public static function persebaran()
    {
        return self::select('alamat_kabupaten', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('alamat_kabupaten')
            ->get();
    }

    public static function kualifikasiAnggota()
    {
        return self::select('kualifikasi', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('kualifikasi')
            ->get();
    }
}
