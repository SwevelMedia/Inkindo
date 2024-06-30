<?php

namespace App\Http\Controllers;

use App\Http\Resources\home\keanggotaan\DaftarAnggotaResource;
use App\Http\Resources\HomeDisplayDmiResource;
use App\Models\ContactUs;
use App\Models\FAQ;
use App\Models\JudulSyaratAnggota;
use App\Models\KategoriGallery;
use App\Models\KategoriHubungiKami;
use App\Models\KategoriProgramKerja;
use App\Models\KlasifikasiKonstruksi;
use App\Models\KlasifikasiNonKonstruksi;
use App\Models\KodeEtik;
use App\Models\LayananKonstruksi;
use App\Models\LayananNonKonstruksi;
use App\Models\PhotoGallery;
use App\Models\Prakata;
use App\Models\User;
use App\Models\Arsip;
use App\Models\Mitra;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Profil;
use App\Models\Slider;
use App\Models\Anggota;
use App\Models\Gallery;
use App\Models\Portofolio;
use App\Models\FAQ_Kategori;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;
use App\Models\ArsipKategori;
use App\Models\ArsipText;
use App\Models\OrganisasiDpp;
use App\Models\BeritaKategori;
use App\Models\KategoriPortofolio;
use App\Models\Klasifikasi;
use App\Models\Kualifikasi;
use App\Models\OrganisasiLain;
use App\Models\PortofolioAnggota;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use LDAP\ResultEntry;

class HomeController extends Controller
{
    public function index()
    {
        $profil = Profil::get();
        $slider = Slider::get();

        $recentAgenda = Agenda::whereRaw('tanggal - curdate() <= 30')
            ->orderBy('tanggal', 'asc')
            ->take(3)
            ->get();

        $kategori = ArsipKategori::all();
        $kategori2 = ArsipKategori::all();
        $arsips = Arsip::with('arsip_kategori')->get();

        $lastBerita = Berita::orderBy('created_at', 'DESC')
            ->take(1)
            ->get();
        $recentBerita = Berita::orderBy('created_at', 'DESC')
            ->skip(1)
            ->take(8)
            ->get();

        $galeris = DB::table('galleries')
            ->select('galleries.id', 'galleries.judul', 'galleries.tanggal', 'kategori_gallery_id', 'photo_galleries.nama_foto')
            ->leftJoin('photo_galleries', function ($join) {
                $join->on('galleries.id', '=', 'photo_galleries.gallery_id')->whereRaw('photo_galleries.id = (SELECT MIN(id)
                    FROM photo_galleries pg WHERE pg.gallery_id = galleries.id)');
            })
            ->orderBy('galleries.created_at', 'desc')
            ->get();

        $galeri_kategori = KategoriGallery::all();
        $anggotas = User::has('anggota')
            ->with(['anggota:id,user_id,perusahaan,alamat,logo'])
            ->orderBy('created_at', 'DESC')
            ->get();

        $mitras = Mitra::latest()->get('logo');

        $dmiResponse = Http::asForm()->get(env('DMI_PRODUK_DISPLAY_HOME'));
        if ($dmiResponse->successful()) {
            $dmiResponse = $dmiResponse->json()['data'];
            return view('welcome', compact('profil', 'slider', 'recentAgenda', 'kategori', 'kategori2', 'arsips', 'lastBerita', 'recentBerita', 'galeris', 'anggotas', 'mitras', 'galeri_kategori', 'dmiResponse'));
        } else {
            return view('welcome', compact('profil', 'slider', 'recentAgenda', 'kategori', 'kategori2', 'arsips', 'lastBerita', 'recentBerita', 'galeris', 'anggotas', 'mitras', 'galeri_kategori'));
        }
    }

    public function profil()
    {
        $profil = Profil::get();
        $daftar_misi = explode(', ', $profil[0]['daftar_misi']);

        $kabupaten_fixed = ['sleman', 'bantul', 'gunungkidul', 'kulonprogo', 'jogja'];
        $persebaran = Anggota::persebaran();
        $persebaran = $persebaran->toArray();
        $kabupaten_cek = [];
        foreach ($persebaran as $item) {
            array_push($kabupaten_cek, $item['alamat_kabupaten']);
        }
        foreach ($kabupaten_fixed as $kabupaten) {
            if (!in_array($kabupaten, $kabupaten_cek)) {
                $persebaran[] = ['alamat_kabupaten' => $kabupaten, 'jumlah' => 0];
            }
        }

        $kualifikasi_fixed = ['kecil', 'menengah', 'besar'];
        $kualifikasi = Anggota::kualifikasiAnggota();
        $kualifikasi = $kualifikasi->toArray();
        $kualifikasi_cek = [];
        foreach ($kualifikasi as $item) {
            array_push($kualifikasi_cek, $item['kualifikasi']);
        }

        foreach ($kualifikasi_fixed as $k_item) {
            if (!in_array($k_item, $kualifikasi_cek)) {
                $kualifikasi[] = ['kualifikasi' => $k_item, 'jumlah' => 0];
            }
        }

        return view('home.profil.profil', compact('profil', 'daftar_misi', 'persebaran', 'kualifikasi'));
    }

    public function prakata()
    {
        $prakata = Prakata::get();

        $kabupaten_fixed = ['sleman', 'bantul', 'gunungkidul', 'kulonprogo', 'jogja'];
        $persebaran = Anggota::persebaran();
        $persebaran = $persebaran->toArray();
        $kabupaten_cek = [];
        foreach ($persebaran as $item) {
            array_push($kabupaten_cek, $item['alamat_kabupaten']);
        }
        foreach ($kabupaten_fixed as $kabupaten) {
            if (!in_array($kabupaten, $kabupaten_cek)) {
                $persebaran[] = ['alamat_kabupaten' => $kabupaten, 'jumlah' => 0];
            }
        }

        $kualifikasi_fixed = ['kecil', 'menengah', 'besar'];
        $kualifikasi = Anggota::kualifikasiAnggota();
        $kualifikasi = $kualifikasi->toArray();
        $kualifikasi_cek = [];
        foreach ($kualifikasi as $item) {
            array_push($kualifikasi_cek, $item['kualifikasi']);
        }

        foreach ($kualifikasi_fixed as $k_item) {
            if (!in_array($k_item, $kualifikasi_cek)) {
                $kualifikasi[] = ['kualifikasi' => $k_item, 'jumlah' => 0];
            }
        }

        return view('home.profil.prakata-baru', compact('prakata', 'persebaran', 'kualifikasi'));
    }

    public function faq()
    {
        $kategori = FAQ_Kategori::all();
        $kategori2 = FAQ_Kategori::all();
        $faqs = FAQ::all();
        $faqs2 = FAQ::with('kategori')->get();

        return view('home.informasi_publik.faq', compact('kategori', 'kategori2', 'faqs', 'faqs2'));
    }

    public function faqCari(Request $request)
    {
        $cari = $request->cari;
        $kategori = FAQ_Kategori::all();
        $kategori2 = FAQ_Kategori::all();

        $faqs = FAQ::where('pertanyaan', 'like', '%' . $cari . '%')->get();

        $faqs2 = FAQ::with('kategori')->get();

        return view('home.informasi_publik.faq', compact('kategori', 'kategori2', 'faqs', 'faqs2'));
    }

    public function regulasi()
    {
        $kategori = ArsipKategori::all();
        $kategori2 = ArsipKategori::all();
        $arsips = Arsip::with('arsip_kategori')->get();
        return view('home.informasi_publik.regulasi', compact('kategori', 'arsips', 'kategori2'));
    }

    public function searchTextRegulasi(Request $request)
    {
        $keyword = $request->kata_kunci;

        $results = ArsipText::where('text', 'like', '%' . $keyword . '%')
            ->with('arsip')
            ->get();
        $groupedResults = $results->groupBy('arsip_id');

        return response()->json($groupedResults);
    }

    public function kode_etik()
    {
        $kode_etik = KodeEtik::all();
        return view('home.profil.kode-etik', compact('kode_etik'));
    }

    public function agenda()
    {
        $allAgenda = Agenda::get();
        $bulan = DB::table('agendas')
            ->select(DB::raw('MONTHNAME(tanggal) as bulan'))
            ->get();
        $bulan = $bulan->unique('bulan');
        $recentAgenda = Agenda::whereRaw('tanggal - curdate() <= 30')
            ->orderBy('tanggal', 'asc')
            ->take(1)
            ->get();
        $otherAgenda = Agenda::whereRaw('tanggal - curdate() > 30')
            ->orderBy('tanggal', 'asc')
            ->take(3)
            ->get();
        $kegiatan = DB::table('agendas')
            ->select(DB::raw('MONTHNAME(tanggal) as bulan, kegiatan'))
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('home.informasi_publik.agenda', compact('allAgenda', 'bulan', 'recentAgenda', 'otherAgenda', 'kegiatan'));
    }

    public function galeri()
    {
        $galeri = DB::table('galleries')
            ->select('galleries.id', 'galleries.judul', 'galleries.tanggal', 'kategori_gallery_id', 'photo_galleries.nama_foto')
            ->leftJoin('photo_galleries', function ($join) {
                $join->on('galleries.id', '=', 'photo_galleries.gallery_id')->whereRaw('photo_galleries.id = (SELECT MIN(id)
                    FROM photo_galleries pg WHERE pg.gallery_id = galleries.id)');
            })
            ->orderBy('galleries.created_at', 'desc')
            ->paginate(8);
        $kategori = KategoriGallery::all();
        $kategori2 = KategoriGallery::all();
        return view('home.informasi_publik.galeri', compact('galeri', 'kategori', 'kategori2'));
    }

    public function detailGaleri($id_galeri)
    {
        $galeriDetail = DB::table('photo_galleries')
            ->where('gallery_id', $id_galeri)
            ->paginate(8); // Ubah jumlah item per halaman sesuai kebutuhan Anda

        $tanggal = DB::table('galleries')
            ->where('id', $id_galeri)
            ->first();

        return view('home.informasi_publik.galeri-detail', compact('galeriDetail', 'tanggal'));
    }
    public function syaratAnggota()
    {
        $kategori1 = JudulSyaratAnggota::where('kategori', 0)->get();
        $kategori2 = JudulSyaratAnggota::where('kategori', 1)->get();

        // $kategori1 = JudulSyaratAnggota::join('poin_syarat_anggota', 'judul_syarat_anggota.id', '=', 'poin_syarat_anggota.judul_syarat_anggota_id')
        //     ->where('judul_syarat_anggota.kategori', 0)
        //     ->select('judul_syarat_anggota.id as judul_id', 'judul_syarat_anggota.nama_judul', 'poin_syarat_anggota.poin')
        //     ->get()
        //     ->groupBy('judul_id');
        // dd($kategori1);

        // $kategori2 = JudulSyaratAnggota::join('poin_syarat_anggota', 'judul_syarat_anggota.id', '=', 'poin_syarat_anggota.judul_syarat_anggota_id')
        //     ->where('judul_syarat_anggota.kategori', 1)
        //     ->select('judul_syarat_anggota.id as judul_id', 'judul_syarat_anggota.nama_judul', 'poin_syarat_anggota.poin')
        //     ->get()
        //     ->groupBy('judul_id');

        // dd($kategori1);
        return view('home.keanggotaan.syarat-keanggotaan', compact('kategori1', 'kategori2'));
    }

    public function proker()
    {
        $kategori = KategoriProgramKerja::all();
        $kategori2 = KategoriProgramKerja::first();
        $proker1 = ProgramKerja::join('kategori_program_kerja', 'kategori_program_kerja.id', '=', 'program_kerja.kategori_id')
            ->select('kategori_program_kerja.nama_kategori', 'program_kerja.nama_proker', 'program_kerja.id', 'periode')
            ->where('kategori_program_kerja.id', $kategori2->id) // Menggunakan ID pertama dari $kategori2
            ->get();

        // dd($kategori2);
        return view('home.informasi_publik.program-kerja', compact('proker1', 'kategori', 'kategori2'));
    }
    public function ambilProker($kategoriId)
    {
        $kategori = KategoriProgramKerja::find($kategoriId);
        $proker = ProgramKerja::where('kategori_id', $kategoriId)->get();

        if (empty($proker)) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        }

        return response()->json([
            'proker' => $proker,
            'meta' => $kategori,
        ]);
    }

    public function beritas()
    {
        $lastBerita = Berita::with('beritaKategori')
            ->orderBy('created_at', 'DESC')
            ->take(1)
            ->get();
        $secondaryBerita = Berita::with('beritaKategori')
            ->orderBy('created_at', 'DESC')
            ->skip(1)
            ->take(2)
            ->get();
        // $recentBerita = Berita::with('beritaKategori')
        //     ->orderBy('created_at', 'DESC')
        //     ->skip(3)
        //     ->paginate(8);

        return view('home.informasi_publik.berita.beritas', compact('lastBerita', 'secondaryBerita'));
    }
    public function dataDaftarBerita(Request $request)
    {
        $page = intval($request->page);
        $page_limit = intval($request->page_limit);
        $totalData = Berita::with('beritaKategori')->count();
        $totalPage = intval(round(($totalData / $page_limit)) - 3);
        if ($totalPage < 1) {
            $totalPage = 1;
        }

        if ($page > 1) {
            $recentBerita = Berita::with('beritaKategori')
                ->orderBy('created_at', 'DESC')
                ->offset((($page - 1) * $page_limit) + 3)
                ->limit($page_limit)
                ->get();

            return response()->json(["data" => $recentBerita, "totalPage" => $totalPage]);
        } elseif ($page === 1) {
            $recentBerita = Berita::with('beritaKategori')
                ->orderBy('created_at', 'DESC')
                ->offset(3)
                ->limit($page_limit)
                ->get();

            return response()->json(["data" => $recentBerita, "totalPage" => $totalPage]);
        }
    }

    public function berita($id)
    {
        $berita = Berita::with('beritaKategori')->find($id);
        $kategori = BeritaKategori::all();
        $recentBerita = Berita::orderBy('created_at', 'DESC')
            ->take(4)
            ->get();
        return view('home.informasi_publik.berita.berita', compact('berita', 'kategori', 'recentBerita'));
    }

    public function daftarAnggota()
    {
        return view('home.keanggotaan.daftar-anggota');
    }

    public function dataDaftarAnggota(Request $request)
    {
        $anggotas = Anggota::with('user')
            ->orderBy('created_at', 'DESC')
            ->paginate(9);
        return response()->json($anggotas);
        // $resAnggotas = DaftarAnggotaResource::collection($anggotas);

        // $konstruksi = Klasifikasi::where('klasifikasi', 'konstruksi')->get();
        // $non_konstruksi = Klasifikasi::where('klasifikasi', 'non_konstruksi')->get();
    }


    public function dataDaftarAnggotaPublik(Request $request)
    {
        $anggotas = Anggota::with('user')
            ->select('id', 'no_anggota', 'perusahaan', 'bentuk_usaha', 'alamat', 'alamat_kabupaten', 'kualifikasi', 'foto_perusahaan', 'logo', 'deskripsi', 'penanggung_jawab', 'user_id', 'created_at', 'updated_at')
            ->orderBy('created_at', 'DESC')
            ->paginate(9);
        return response()->json($anggotas);
        // $resAnggotas = DaftarAnggotaResource::collection($anggotas);

        // $konstruksi = Klasifikasi::where('klasifikasi', 'konstruksi')->get();
        // $non_konstruksi = Klasifikasi::where('klasifikasi', 'non_konstruksi')->get();
    }

    public function searchAnggota(Request $request)
    {
        $kata_kunci = $request->kata_kunci;
        $anggotas = Anggota::where(function ($query) use ($kata_kunci) {
            $query->where('perusahaan', 'like', '%' . $kata_kunci . '%')
                ->orWhere('no_anggota', 'like', '%' . $kata_kunci . '%') // Add more columns here
                ->orWhere('penanggung_jawab', 'like', '%' . $kata_kunci . '%');
        })
            ->with('user')
            ->orderBy('created_at', 'DESC')
            ->paginate(9);

        return response()->json($anggotas);
    }


    public function searchAnggotaPublik(Request $request)
    {
        $kata_kunci = $request->kata_kunci;
        $anggotas = Anggota::where('perusahaan', 'like', '%' . $kata_kunci . '%')
            ->with('user')
            ->select('id', 'no_anggota', 'perusahaan', 'bentuk_usaha', 'alamat', 'alamat_kabupaten', 'kualifikasi', 'foto_perusahaan', 'logo', 'deskripsi', 'penanggung_jawab', 'user_id', 'created_at', 'updated_at')
            ->orderBy('created_at', 'DESC')
            ->paginate(9);

        return response()->json($anggotas);
    }

    public function filterAnggota(Request $request)
    {
        $kategori_klsfks = $request->kategori_klsfks;
        $kualifikasi = $request->kualifikasi;

        if ($kategori_klsfks && $kualifikasi) {
            $klasifikasi = array_map('intval', $kategori_klsfks);
            $anggotas_filtered = Anggota::whereHas('klasifikasi', function ($query) use ($kualifikasi, $klasifikasi) {
                $query->whereIn('klasifikasis.id', $klasifikasi)->orWhereIn('anggotas.kualifikasi', $kualifikasi);
            })
                ->with('user')
                ->orderBy('created_at', 'DESC')
                ->paginate(9);

            return response()->json($anggotas_filtered);
        } elseif ($kategori_klsfks) {
            $klasifikasi = array_map('intval', $kategori_klsfks);
            $anggotas_filtered = Anggota::whereHas('klasifikasi', function ($query) use ($klasifikasi) {
                $query->whereIn('klasifikasis.id', $klasifikasi);
            })
                ->with('user')
                ->orderBy('created_at', 'DESC')
                ->paginate(9);

            return response()->json($anggotas_filtered);
        } elseif ($kualifikasi) {
            $anggotas_filtered = Anggota::whereIn('kualifikasi', $kualifikasi)
                ->with('user')
                ->orderBy('created_at', 'DESC')
                ->paginate(9);

            return response()->json($anggotas_filtered);
        } else {
            $anggotas = Anggota::with('user')
                ->orderBy('created_at', 'DESC')
                ->paginate(9);
            return response()->json($anggotas);
        }
    }

    public function filterAnggotaPublik(Request $request)
    {
        $kategori_klsfks = $request->kategori_klsfks;
        $kualifikasi = $request->kualifikasi;

        if ($kategori_klsfks && $kualifikasi) {
            $klasifikasi = array_map('intval', $kategori_klsfks);
            $anggotas_filtered = Anggota::whereHas('klasifikasi', function ($query) use ($kualifikasi, $klasifikasi) {
                $query->whereIn('klasifikasis.id', $klasifikasi)->orWhereIn('anggotas.kualifikasi', $kualifikasi);
            })
                ->with('user')
                ->select('id', 'no_anggota', 'perusahaan', 'bentuk_usaha', 'alamat', 'alamat_kabupaten', 'kualifikasi', 'foto_perusahaan', 'logo', 'deskripsi', 'penanggung_jawab', 'user_id', 'created_at', 'updated_at')
                ->orderBy('created_at', 'DESC')
                ->paginate(9);

            return response()->json($anggotas_filtered);
        } elseif ($kategori_klsfks) {
            $klasifikasi = array_map('intval', $kategori_klsfks);
            $anggotas_filtered = Anggota::whereHas('klasifikasi', function ($query) use ($klasifikasi) {
                $query->whereIn('klasifikasis.id', $klasifikasi);
            })
                ->with('user')
                ->select('id', 'no_anggota', 'perusahaan', 'bentuk_usaha', 'alamat', 'alamat_kabupaten', 'kualifikasi', 'foto_perusahaan', 'logo', 'deskripsi', 'penanggung_jawab', 'user_id', 'created_at', 'updated_at')
                ->orderBy('created_at', 'DESC')
                ->paginate(9);

            return response()->json($anggotas_filtered);
        } elseif ($kualifikasi) {
            $anggotas_filtered = Anggota::whereIn('kualifikasi', $kualifikasi)
                ->with('user')
                ->select('id', 'no_anggota', 'perusahaan', 'bentuk_usaha', 'alamat', 'alamat_kabupaten', 'kualifikasi', 'foto_perusahaan', 'logo', 'deskripsi', 'penanggung_jawab', 'user_id', 'created_at', 'updated_at')
                ->orderBy('created_at', 'DESC')
                ->paginate(9);

            return response()->json($anggotas_filtered);
        } else {
            $anggotas = Anggota::with('user')
                ->select('id', 'no_anggota', 'perusahaan', 'bentuk_usaha', 'alamat', 'alamat_kabupaten', 'kualifikasi', 'foto_perusahaan', 'logo', 'deskripsi', 'penanggung_jawab', 'user_id', 'created_at', 'updated_at')
                ->orderBy('created_at', 'DESC')
                ->paginate(9);
            return response()->json($anggotas);
        }
    }

    public function profilAnggota($id)
    {
        $anggota = Anggota::with('user')->find($id);
        $portoAngg = PortofolioAnggota::with('portofolioGambar')
            ->where('anggota_id', $id)
            ->get();
        $kategoriAngg = KategoriPortofolio::where('anggota_id', $id)->get();

        return view('home.keanggotaan.portofolio-anggota', compact('anggota', 'portoAngg', 'kategoriAngg'));
    }

    public function profilAnggotaVendor(Request $request)
    {
        $npwp = $request->npwp;
        $anggota = Anggota::with('user')->where('npwp', $npwp)->first();
        // $portoAngg = PortofolioAnggota::with('portofolioGambar')
        //     ->where('anggota_id', $id)
        //     ->get();
        // $kategoriAngg = KategoriPortofolio::where('anggota_id', $id)->get();
        return view('home.keanggotaan.profil-keanggotaan-vendor', compact('anggota'));
    }

    public function profilAnggotaVendorApi(Request $request)
    {
        $npwp = $request->npwp;
        $anggota = Anggota::with('user')->where('npwp', $npwp)->first();
        // $portoAngg = PortofolioAnggota::with('portofolioGambar')
        //     ->where('anggota_id', $id)
        //     ->get();
        // $kategoriAngg = KategoriPortofolio::where('anggota_id', $id)->get();
        return response()->json($anggota);
    }


    public function portofolioByKategori(Request $request, $id)
    {
        // $portoAngg = PortofolioAnggota::with('portofolioGambar')
        //     ->where('anggota_id', $id)
        //     ->get();
        // $anggota = $request->anggota_id;
        $kategori = $request->kategori;

        if ($kategori == 0) {
            $portoAnggAll = PortofolioAnggota::where('anggota_id', $id)
                ->with('portofolioGambar')
                ->get();
            return response()->json($portoAnggAll);
        } else {
            $portoByKat = PortofolioAnggota::whereHas('kategoriPortofolio', function ($query) use ($id, $kategori) {
                $query->where('kategori_id', $kategori);
            })
                ->with('kategoriPortofolio')
                ->where('anggota_id', $id)
                ->with('portofolioGambar')
                ->get();

            return response()->json($portoByKat);
        }
    }

    public function modalByPorto($id)
    {
        $modal = PortofolioAnggota::with('portofolioGambar')
            ->where('id', $id)
            ->get();
        return response()->json($modal);
    }

    public function anggota()
    {
        $anggota = Anggota::with('portofolio')->get();
        $portofolio = Portofolio::with('anggota')->get();
        $subPortofolio = Portofolio::with('anggota')->get();
        return view('home.informasi_publik.daftar-anggota', compact('anggota', 'portofolio', 'subPortofolio'));
    }

    public function organisasi()
    {
        $organisasidpp = OrganisasiDpp::get();
        $organisasi_dewan_badan = OrganisasiLain::get();
        return view('home.profil.struktur-organisasi', compact('organisasidpp', 'organisasi_dewan_badan'));
    }

    public function layananKonstruksi()
    {
        $kategori1 = KlasifikasiKonstruksi::first();
        $kategori2 = KlasifikasiKonstruksi::all();

        $kons = LayananKonstruksi::with('klasifikasi_konstruksi')->get();
        $default = DB::table('layanan_konstruksis')
            ->where('klasifikasi_konstruksi_id', $kategori1->id)
            ->get();
        return view('home.layanan.konstruksi', compact('kategori1', 'kategori2', 'kons', 'default'));
    }

    public function layananNonKonstruksi()
    {
        $kategori1 = KlasifikasiNonKonstruksi::first();
        $kategori2 = KlasifikasiNonKonstruksi::all();
        $kons = LayananNonKonstruksi::with('klasifikasi_non_konstruksi')->get();
        $default = DB::table('layanan_non_konstruksis')
            ->where('klasifikasi_non_konstruksi_id', $kategori1->id)
            ->get();
        return view('home.layanan.non-konstruksi', compact('kategori1', 'kategori2', 'kons', 'default'));
    }
    public function ContactUs()
    {
        $kontak = profil::get();
        $kategori = KategoriHubungiKami::get();

        return view('home.informasi_publik.contact', compact('kategori', 'kontak'));
    }
}
