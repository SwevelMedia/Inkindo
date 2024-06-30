<?php

use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\GalleryFotoController;
use App\Http\Controllers\Admin\GalleryKategoriController;
use App\Http\Controllers\Admin\HubungiKamiController;
use App\Http\Controllers\Admin\KategoriHubungiKamiController;
use App\Http\Controllers\Admin\KlasifikasiKonstruksiController;
use App\Http\Controllers\Admin\KlasifikasiNonKonstruksiController;
use App\Http\Controllers\Admin\KodeEtikController;
use App\Http\Controllers\Admin\LayananKonstruksiController;
use App\Http\Controllers\Admin\LayananNonKonstruksiController;
use App\Http\Controllers\Admin\PrakataController;
use App\Http\Controllers\Admin\SyaratAnggotaController;
use App\Http\Controllers\DMI\homeDMIController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HubungiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\FAQ_Controller;
use App\Http\Controllers\Admin\ArsipController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\ProkerController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\FAQ_KategoriController;
use App\Http\Controllers\Admin\ArsipKategoriController;
use App\Http\Controllers\Admin\BeritaKategoriController;
use App\Http\Controllers\Admin\MitraController;
use App\Http\Controllers\Admin\OrganisasiDppController;
use App\Http\Controllers\Admin\OrganisasiLainController;
use App\Http\Controllers\Anggota\AnggotaPortofolioController;
use App\Http\Controllers\Anggota\PortofolioController;
use App\Http\Controllers\Anggota\AnggotaProfilController;
use App\Http\Controllers\Anggota\KategoriPortoController;
use App\Http\Controllers\DetailGaleriController;
use App\Http\Controllers\DMI\DMIController;
use App\Models\Anggota;
use App\Models\BeritaKategori;
use App\Models\PortofolioAnggota;
use SebastianBergmann\LinesOfCode\Counter;
use Smalot\PdfParser\Pages;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil-inkindo', [HomeController::class, 'profil'])->name('home.profil');
Route::get('/prakata-inkindo', [HomeController::class, 'prakata'])->name('home.prakata');
Route::get('/faq/cari', [HomeController::class, 'faqCari'])->name('home.faq.cari');
Route::get('/regulasi', [HomeController::class, 'regulasi'])->name('home.regulasi');
Route::get('/agenda', [HomeController::class, 'agenda'])->name('home.agenda');
Route::get('/galeri-inkindo', [HomeController::class, 'galeri'])->name('home.galeri');
Route::get('/galeri-inkindo/{id}', [HomeController::class, 'detailGaleri'])->name('home.galeri-detail');
Route::get('/program-kerja-inkindo', [HomeController::class, 'proker'])->name('home.proker1');
Route::get('/ambil-proker/{kategoriId}', [HomeController::class, 'ambilProker'])->name('home.proker');
Route::get('/struktur-organisasi', [HomeController::class, 'organisasi'])->name('home.organisasi');
Route::get('/fetch-organisasi', [HomeController::class, 'fetchOrganisasi'])->name('home.fetch.organisasi');
Route::get('/berita', [HomeController::class, 'berita'])->name('home.berita');
Route::view('/berita/all', 'home.informasi_publik.berita.beritas')->name('home.berita.all');
Route::get('/berita/{id}', [HomeController::class, 'beritaDetail'])->name('home.berita.detail');
Route::get('/layanan/konstruksi', [HomeController::class, 'layananKonstruksi'])->name('home.layanan.konstruksi');
Route::get('/layanan/non-konstruksi', [HomeController::class, 'layananNonKonstruksi'])->name('home.layanan.nonkonstruksi');
Route::get('/kode-etik', [HomeController::class, 'kode_etik'])->name('home.kode-etik');
Route::get('/keanggotaan', [HomeController::class, 'syaratAnggota'])->name('home.syarat-anggota');
Route::get('/galeri_detail/{id}', [GalleryFotoController::class, 'index'])->name('galeri_detail');
Route::get('/contact', [HomeController::class, 'ContactUs'])->name('contact');

Route::resources([
    'hubungi' => HubungiController::class,
]);

// Route::get('/sync', function () {
//     // $angka = range(16, 25);
//     //  $new_anggota = Anggota::find( $angka);
//     //  $kualifikasi = ['8'];
//     //  foreach ($new_anggota as $item) {
//     //   $item->klasifikasi()->sync($kualifikasi);
//     //  }

//     $portofolio = PortofolioAnggota::find(29);
//     $portofolio->kategoriPortofolio()->sync(3);
// });

// Route::get('/textPdf', function () {
//     $parser = new \Smalot\PdfParser\Parser();
// $file = public_path('storage/uploads/admin/arsip/KEPUTUSAN DIRJEN PENETAPAN SKEMA BUJK NOMOR 144 TAHUN 2022.pdf');
//     $pdf = $parser->parseFile($file);
//     // $text = $pdf->getText();
//     $pages = $pdf->getPages();
//     $counter = 0;
//     foreach ($pages as $p => $value) {
//         dd($pages[$p]->getText());
//         dd($p+1);
//     //   $counter +=1;
//     }
//     dd($counter);

//     echo $pages;
// });

Route::GET('/searchTextRegulasi', [HomeController::class, 'searchTextRegulasi'])->name('search.regulasi');

Route::controller(HomeController::class)
    // ->prefix('/home')
    ->as('home.')
    ->group(function () {
        // ----------------------Berita
        Route::GET('/beritas', 'beritas')->name('beritas');
        Route::GET('/beritas/data', 'dataDaftarBerita')->name('data-berita');
        Route::GET('/berita/{id}', 'berita')->name('berita');
        // ----------------------Kode Etik
        Route::GET('/kode-etik-inkindo', 'kode_etik')->name('kode-etik');
        // ------------------------FAQ
        Route::GET('/faq-inkindo', 'faq')->name('faq');
        // ----------------------DaftarAnggota
        Route::GET('/anggota-inkindo', 'daftarAnggota')->name('daftar-anggota');
        // Route::GET('/anggota/data', 'dataDaftarAnggota')->name('data-anggota');
        Route::GET('/anggota/data-publik', 'dataDaftarAnggotaPublik')->name('data-anggota-publik');
        // Route::POST('/filter-anggota', 'filterAnggota')->name('filter-anggota');
        Route::POST('/filter-anggota-publik', 'filterAnggotaPublik')->name('filter-anggota-publik');
        // Route::GET('/search-anggota', 'searchAnggota')->name('search-anggota');
        Route::GET('/search-anggota-publik', 'searchAnggotaPublik')->name('search-anggota-publik');
        // ---------------------Profil-Portofolio Anggota
        Route::GET('/profil-anggota/{id}', 'profilAnggota')->name('profil-anggota');
        // -----------------------FilterPortoByKategori
        Route::POST('/filter-portofolio/{id}', 'portofolioByKategori')->name('filter-kategori');
        Route::GET('/filter-porto-modal/{id}', 'modalByPorto')->name('filter-porto-modal');
    });

Route::middleware(['auth'])->group(function () {
    Route::controller(HomeController::class)
        // ->prefix('/home')
        ->as('home.')
        ->group(function () {
            Route::GET('/anggota-inkindo/data', 'dataDaftarAnggota')->name('data-anggota');
            Route::POST('/filter-anggota', 'filterAnggota')->name('filter-anggota');
            Route::GET('/search-anggota', 'searchAnggota')->name('search-anggota');
        });
});

Route::view('/prakata', 'home.profil.prakata-baru');
Route::view('/program-kerja', 'home.informasi_publik.program-kerja');

// dmi

Route::controller(DMIController::class)
    ->prefix('/dmi')
    ->as('dmi.')
    ->group(function () {
        Route::GET('/', 'home')->name('search');
        Route::GET('about-us', 'aboutUs')->name('about-us');
        Route::GET('produk', 'produk')->name('produk-us');
        Route::GET('suplier', 'suplier')->name('suplier');
        Route::GET('data-suplier', 'dataSuplier')->name('data.suplier');

        Route::GET('detail-suplier/{id}', 'detailSuplier')->name('detail.suplier');
        Route::GET('produk-suplier/{id}', 'produkSuplier')->name('produk.suplier');

        Route::GET('product/{id}', 'detailProduk')->name('detail-product');
        Route::POST('filter-produk', 'filterProduk')->name('filter.produk');

        Route::GET('produk/populer', 'produkPopuler')->name('produk.populer');
    });

Route::get('/dmi/article', function () {
    return view('DMI.article');
})->name('article');
// Route::get('/article', [ArticleController::class, 'index'])->name('article');

Route::get('/dmi/suplier/id', function () {
    return view('DMI.suplier.detail-suplier');
})->name('detail-suplier');

Route::get('/dmi/kebijakan', function () {
    return view('DMI.kebijakan-privasi');
})->name('kebijakan');

Route::get('/dmi/kebijakan', function () {
    return view('DMI.faq');
})->name('faq');

Route::get('/dmi/hubungi-kami', function () {
    return view('DMI.about-us');
})->name('hubingi-kami-dmi');

Auth::routes();

// Route untuk anggota
Route::middleware(['auth', 'user-access:anggota'])->group(function () {
    Route::get('/dashboard/anggota', [DashboardController::class, 'index'])->name('dashboard.anggota');
    Route::controller(AnggotaProfilController::class)
        ->prefix('/anggotaprofil')
        ->as('anggotaprofil.')
        ->group(function () {
            Route::GET('/', 'index')->name('index');
            Route::POST('/', 'store')->name('store');
            Route::POST('/{id}', 'update')->name('update');
            Route::DELETE('/{id}', 'destroy')->name('destroy');
        });
    Route::controller(KategoriPortoController::class)
        ->prefix('/kategori-portofolio')
        ->as('kategori-portofolio.')
        ->group(function () {
            Route::POST('/', 'store')->name('store');
            Route::POST('/{id}', 'update')->name('update');
            Route::DELETE('/{id}', 'destroy')->name('destroy');
        });
    Route::controller(AnggotaPortofolioController::class)
        ->prefix('/portofolio')
        ->as('portofolio.')
        ->group(function () {
            Route::GET('/', 'index')->name('index');
            Route::POST('/', 'store')->name('store');
            Route::POST('/{id}', 'update')->name('update');
            Route::DELETE('/{id}', 'destroy')->name('destroy');
        });
});

// Route untuk Vendor (Tenderplus)
Route::middleware(['referral'])->group(function () {
    Route::controller(HomeController::class)
        // ->prefix('/home')
        ->as('home.')
        ->group(function () {
            Route::POST('/profil-anggota-vendor', 'profilAnggotaVendor')->name('profil-anggota-vendor');
            Route::POST('api/profil-anggota-vendor', 'profilAnggotaVendorApi')->name('profil-anggota-vendor-api');
        });
});

// Route untuk admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');

    Route::controller(AkunController::class)
        ->prefix('/akun')
        ->as('akun.')
        ->group(function () {
            Route::GET('/', 'index')->name('index');
            Route::POST('/', 'store')->name('store');
            Route::POST('/{id}', 'update')->name('update');
            Route::DELETE('/{id}', 'destroy')->name('destroy');
        });

    Route::controller(AnggotaController::class)
        ->prefix('/anggota')
        ->as('anggota.')
        ->group(function () {
            // -----------kualifikasi konstruksi
            Route::POST('/konstruksi', 'storeKonstruksi')->name('konstruksi.store');
            Route::POST('/konstruksi/{id}', 'updateKonstruksi')->name('konstruksi.update');
            Route::DELETE('/konstruksi/{id}', 'destroyKonstruksi')->name('konstruksi.destroy');

            // -----------kualifikasi Non konstruksi
            Route::POST('/non-konstruksi', 'storeNonKonstruksi')->name('nonKonstruksi.store');
            Route::POST('/non-onstruksi/{id}', 'updateNonKonstruksi')->name('nonKonstruksi.update');
            Route::DELETE('/non-konstruksi/{id}', 'destroyNonKonstruksi')->name('nonKonstruksi.destroy');

            // -----------anggota
            Route::GET('/', 'index')->name('index');
            Route::POST('/', 'store')->name('store');
            Route::POST('/{id}', 'update')->name('update');
            Route::DELETE('/{id}', 'destroy')->name('destroy');
            Route::GET('/hapus/data/', 'showDataDestroyById')->name('show.data.destroy');

            //---------anggota with dataTable yajra
            Route::GET('/data', 'dataAnggotaJson')->name('data');
            Route::GET('/data/{id}', 'dataAnggotaByIdJson')->name('data.byId');

            //------------store excel anggotas
            Route::POST('/excel/store', 'storeExcelAnggota')->name('excel.store');

            // ----------Filter Anggota
        });

    Route::resources([
        'profil' => ProfilController::class,
    ]);

    Route::controller(SliderController::class)
        ->prefix('/slider')
        ->as('slider.')
        ->group(function () {
            Route::GET('/', 'index')->name('index');
            Route::POST('/', 'store')->name('store');
            Route::POST('/{id}', 'update')->name('update');
            Route::DELETE('/{id}', 'destroy')->name('destroy');
        });

    Route::controller(FAQ_KategoriController::class)
        ->prefix('/faq_kategori')
        ->as('faq_kategori.')
        ->group(function () {
            Route::GET('/', 'index')->name('index');
            Route::POST('/', 'store')->name('store');
            Route::POST('/{id}', 'update')->name('update');
            Route::DELETE('/{id}', 'destroy')->name('destroy');
        });

    Route::controller(FAQ_Controller::class)
        ->prefix('/faq')
        ->as('faq.')
        ->group(function () {
            Route::GET('/', 'index')->name('index');
            Route::POST('/', 'store')->name('store');
            Route::POST('/{id}', 'update')->name('update');
            Route::DELETE('/{id}', 'destroy')->name('destroy');
        });

    Route::controller(ArsipController::class)
        ->prefix('/arsip')
        ->as('arsip.')
        ->group(function () {
            Route::GET('/', 'index')->name('index');
            Route::POST('/', 'store')->name('store');
            Route::POST('/{id}', 'update')->name('update');
            Route::DELETE('/{id}', 'destroy')->name('destroy');
        });

    Route::controller(ArsipKategoriController::class)
        ->prefix('/arsip_kategori')
        ->as('arsip_kategori.')
        ->group(function () {
            Route::GET('/', 'index')->name('index');
            Route::POST('/', 'store')->name('store');
            Route::POST('/{id}', 'update')->name('update');
            Route::DELETE('/{id}', 'destroy')->name('destroy');
        });

    Route::resources([
        'agenda' => AgendaController::class,
    ]);

    Route::controller(BeritaKategoriController::class)
        ->prefix('/berita_kategori')
        ->as('berita_kategori.')
        ->group(function () {
            Route::GET('/', 'index')->name('index');
            Route::POST('/', 'store')->name('store');
            Route::POST('/{id}', 'update')->name('update');
            Route::DELETE('/{id}', 'destroy')->name('destroy');
        });

    Route::controller(BeritaController::class)
        ->prefix('/berita')
        ->as('berita.')
        ->group(function () {
            Route::GET('/', 'index')->name('index');
            Route::POST('/', 'store')->name('store');
            Route::POST('/{id}', 'update')->name('update');
            Route::DELETE('/{id}', 'destroy')->name('destroy');
        });

    Route::resources([
        'organisasi' => OrganisasiDppController::class,
    ]);
    Route::resources([
        'galeri' => GalleryController::class,
    ]);
    Route::resources([
        'proker' => ProkerController::class,
    ]);
    Route::resources([
        'organisasi_lain' => OrganisasiLainController::class,
    ]);

    Route::controller(MitraController::class)
        ->prefix('/mitra')
        ->as('mitra.')
        ->group(function () {
            Route::GET('/', 'index')->name('index');
            Route::POST('/', 'store')->name('store');
            Route::POST('/{id}', 'update')->name('update');
            Route::DELETE('/{id}', 'destroy')->name('destroy');
        });

    Route::resources([
        'galeri_kategori' => GalleryKategoriController::class,
    ]);
    Route::resources([
        'galeri_detail' => GalleryFotoController::class,
    ]);
    Route::resources([
        'prakata' => PrakataController::class,
    ]);
    Route::controller(KodeEtikController::class)
        ->prefix('/kode-etik')
        ->as('kode-etik.')
        ->group(function () {
            Route::GET('/', 'index')->name('index');
            Route::POST('/', 'store')->name('store');
            Route::POST('/{id}', 'update')->name('update');
            Route::DELETE('/{id}', 'destroy')->name('destroy');
        });
    Route::controller(KategoriHubungiKamiController::class)
        ->prefix('/kategori-hubungi')
        ->as('kategori-hubungi.')
        ->group(function () {
            Route::GET('/', 'index')->name('index');
            Route::POST('/', 'store')->name('store');
            Route::POST('/{id}', 'update')->name('update');
            Route::DELETE('/{id}', 'destroy')->name('destroy');
        });
    // Route::resources([
    //     'kategori-hubungi' => KategoriHubungiKamiController::class,
    // ]);
    Route::resources([
        'syarat-anggota' => SyaratAnggotaController::class,
    ]);
    Route::resources([
        'klasifikasi-konstruksi' => KlasifikasiKonstruksiController::class,
    ]);
    Route::resources([
        'klasifikasi-nonkonstruksi' => KlasifikasiNonKonstruksiController::class,
    ]);
    Route::resources([
        'layanan-konstruksi' => LayananKonstruksiController::class,
    ]);
    Route::resources([
        'layanan-nonkonstruksi' => LayananNonKonstruksiController::class,
    ]);
    // Route::resources([
    //     'hubungi-kami' => HubungiKamiController::class,
    // ]);
    Route::resources([
        'klasifikasi-konstruksi' => KlasifikasiKonstruksiController::class,
    ]);
    Route::resources([
        'klasifikasi-nonkonstruksi' => KlasifikasiNonKonstruksiController::class,
    ]);
    Route::resources([
        'layanan-konstruksi' => LayananKonstruksiController::class,
    ]);
    Route::resources([
        'layanan-nonkonstruksi' => LayananNonKonstruksiController::class,
    ]);
    Route::resources([
        'hubungi-kami' => HubungiKamiController::class,
    ]);
});

Route::get('/checkOnline', function (App\Repositories\AttendanceRepository $attendanceRepo) {
    if (Auth::check() && Auth::user()->role == 'anggota') {
    }
    return $attendanceRepo->CountUserOnline();
})->name('checkOnline');
