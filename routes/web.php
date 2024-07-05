<?php

use App\Http\Controllers\Admin\LaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\BerkasPublikController;
use App\Http\Controllers\Admin\GambarJenisPelayananController;
use App\Http\Controllers\Admin\GambarStandardPelayananController;
use App\Http\Controllers\Admin\InformasiPuskesmasController;
use App\Http\Controllers\Admin\JadwalPelayananController;
use App\Http\Controllers\Admin\JenisPelayananController;
use App\Http\Controllers\Admin\MaklumatPelayananController;
use App\Http\Controllers\Admin\MekanismeAlurController;
use App\Http\Controllers\admin\PegawaiFavoritController;
use App\Http\Controllers\HalamanUtamaController;
use App\Http\Controllers\Admin\VisiMisiController;
use App\Http\Controllers\ShowDetailBeritaController;
use App\Http\Controllers\Admin\ProfilePuskesmasController;
use App\Http\Controllers\Admin\PegawaiPuskesmasController;
use App\Http\Controllers\Admin\SKKompensasiController;
use App\Http\Controllers\Admin\SKPetugasPengaduan;
use App\Http\Controllers\Admin\StandardPelayananController;
use App\Http\Controllers\Admin\PublikasiIkmController;
use App\Http\Controllers\admin\TanyaJawabController;
use App\Http\Controllers\Admin\TarifPelayananController;
use App\Http\Controllers\UserJenisPelayananController;
use App\Http\Controllers\UserPengaduanController;
use App\Http\Controllers\UserPublikasiIkmController;
use App\Http\Controllers\UserStandardPelayananController;

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

Route::group(['middleware' => ['IsTamu']], function () {
    Route::get('/', [HalamanUtamaController::class, 'halaman_utama'])->name('/');
    Route::get('ajaxSejarah', [HalamanUtamaController::class, 'ajaxSejarah'])->name('ajaxSejarah');
    Route::get('ajaxVisiMisi', [HalamanUtamaController::class, 'ajaxVisiMisi'])->name('ajaxVisiMisi');
    Route::get('ajaxPegawai', [HalamanUtamaController::class, 'ajaxPegawai'])->name('ajaxPegawai');
    Route::get('ajaxStandardLayanan', [HalamanUtamaController::class, 'ajaxStandardLayanan'])->name('ajaxStandardLayanan');
    Route::get('ajaxJenisPelayanan', [HalamanUtamaController::class, 'ajaxJenisPelayanan'])->name('ajaxJenisPelayanan');
    Route::get('ajaxMaklumat', [HalamanUtamaController::class, 'ajaxMaklumat'])->name('ajaxMaklumat');

    // Standard Pelayanan
    Route::get('UserStandardLayanan/{id}', [UserStandardPelayananController::class, 'index'])->name('UserStandardLayanan');
    // Jenis Pelayanan
    Route::get('UserJenispelayanan/{id}', [UserJenisPelayananController::class, 'index'])->name('UserJenispelayanan');

    // Pengaduan
    Route::get('UserMekanisme_alur', [UserPengaduanController::class, 'UserMekanisme_alur'])->name('UserMekanisme_alur');
    Route::get('UserSKPetugas_Pengaduan', [UserPengaduanController::class, 'UserSKPetugas_Pengaduan'])->name('UserSKPetugas_Pengaduan');
    Route::get('UserSK_kompensasi', [UserPengaduanController::class, 'UserSK_kompensasi'])->name('UserSK_kompensasi');

    // User Publik IKM
    Route::get('ikm', [UserPublikasiIkmController::class, 'UserPublikasi_IKM'])->name('UserPublikasi_IKM');
    Route::post('ajax_ikm', [UserPublikasiIkmController::class, 'ajax_ikm'])->name('User_ajax_ikm');
    Route::POST('CariPublikasi_IKM', [UserPublikasiIkmController::class, 'CariPublikasi_IKM'])->name('CariPublikasi_IKM');

    // Detail Berita
    Route::get('detail_berita/{slug_berita}', [ShowDetailBeritaController::class, 'detail_berita'])->name('user_detail_berita');
    Route::get('download_file/{id}', [ShowDetailBeritaController::class, 'download_file'])->name('user_download_file');
    Route::get('user_semua_berita', [ShowDetailBeritaController::class, 'semua_berita'])->name('user_semua_berita');

    //  Auth
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::POST('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');


    // Pertanyaan
    Route::post('kirim_pertanyaan', [HalamanUtamaController::class, 'kirimPertanyaan'])->name('kirim_pertanyaan');
});
Route::group(['middleware' => ['IsLogin']], function () {
    Route::get('logout/{id}', [AuthController::class, 'logout'])->name('logout');
    Route::prefix('admin-puskesmas')->group(function () {
        // Dashboard
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        // admin
        Route::get('profile_puskesmas', [ProfilePuskesmasController::class, 'index'])->name('profile_puskesmas');
        Route::get('edit_profile/{id}', [ProfilePuskesmasController::class, 'edit'])->name('edit_profile');
        Route::POST('update_profile/{id}', [ProfilePuskesmasController::class, 'update'])->name('update_profile');
        Route::POST('hapus_profile/{id}', [ProfilePuskesmasController::class, 'destroy'])->name('hapus_profile');

        // Visi Misi
        Route::get('visi_misi', [VisiMisiController::class, 'index'])->name('visi_misi');
        Route::get('edit_visi_misi/{id}', [VisiMisiController::class, 'edit'])->name('edit_visi_misi');
        Route::POST('update_visi_misi/{id}', [VisiMisiController::class, 'update'])->name('update_visi_misi');

        // Pegawai
        Route::get('pegawai_puskesmas', [PegawaiPuskesmasController::class, 'index'])->name('pegawai_puskesmas');
        Route::get('add_pegawai_puskesmas', [PegawaiPuskesmasController::class, 'create'])->name('add_pegawai_puskesmas');
        Route::POST('store_pegawai_puskesmas', [PegawaiPuskesmasController::class, 'store'])->name('store_pegawai_puskesmas');
        Route::get('edit_pegawai_puskesmas/{id}', [PegawaiPuskesmasController::class, 'edit'])->name('edit_pegawai_puskesmas');
        Route::POST('update_pegawai_puskesmas/{id}', [PegawaiPuskesmasController::class, 'update'])->name('update_pegawai_puskesmas');
        Route::POST('hapus_pegawai_puskesmas', [PegawaiPuskesmasController::class, 'destroy'])->name('hapus_pegawai_puskesmas');

        // Berita
        Route::get('berita', [BeritaController::class, 'index'])->name('berita');
        Route::get('add_berita', [BeritaController::class, 'create'])->name('add_berita');
        Route::POST('store_berita', [BeritaController::class, 'store'])->name('store_berita');
        Route::get('edit_berita/{id}', [BeritaController::class, 'edit'])->name('edit_berita');
        Route::POST('update_berita/{id}', [BeritaController::class, 'update'])->name('update_berita');
        Route::POST('hapus_berita/{id}', [BeritaController::class, 'destroy'])->name('hapus_berita');

        // Berkas Layanan Publik
        Route::get('berkas_layanan_publik', [BerkasPublikController::class, 'index'])->name('berkas_layanan_publik');
        Route::get('edit_berkas/{id}', [BerkasPublikController::class, 'edit'])->name('edit_berkas');
        Route::POST('update_berkas/{id}', [BerkasPublikController::class, 'update'])->name('update_berkas');

        // Maklumat Layanan Publik
        Route::get('maklumat_layanan_publik', [MaklumatPelayananController::class, 'index'])->name('maklumat_layanan_publik');
        Route::get('edit_maklumat/{id}', [MaklumatPelayananController::class, 'edit'])->name('edit_maklumat');
        Route::POST('update_maklumat/{id}', [MaklumatPelayananController::class, 'update'])->name('update_maklumat');

        // Standard Pelayanan
        Route::get('standard_pelayanan', [StandardPelayananController::class, 'index'])->name('standard_pelayanan');
        Route::get('add_pelayanan', [StandardPelayananController::class, 'create'])->name('add_pelayanan');
        Route::POST('store_pelayanan', [StandardPelayananController::class, 'store'])->name('store_pelayanan');
        Route::get('edit_pelayanan/{id}', [StandardPelayananController::class, 'edit'])->name('edit_pelayanan');
        Route::POST('update_pelayanan/{id}', [StandardPelayananController::class, 'update'])->name('update_pelayanan');
        Route::POST('hapus_pelayanan', [StandardPelayananController::class, 'destroy'])->name('hapus_pelayanan');

        // Gambar Standard Pelayanan
        Route::get('show_pelayanan_gambar/{id}', [GambarStandardPelayananController::class, 'index'])->name('show_pelayanan_gambar');
        Route::get('create_pelayanan_gambar/{id}', [GambarStandardPelayananController::class, 'create'])->name('create_pelayanan_gambar');
        Route::POST('store_pelayanan_gambar', [GambarStandardPelayananController::class, 'store'])->name('store_pelayanan_gambar');
        Route::get('edit_pelayanan_gambar/{id}', [GambarStandardPelayananController::class, 'edit'])->name('edit_pelayanan_gambar');
        Route::POST('update_pelayanan_gambar/{id}', [GambarStandardPelayananController::class, 'update'])->name('update_pelayanan_gambar');
        Route::POST('hapus_pelayanan_gambar', [GambarStandardPelayananController::class, 'destroy'])->name('hapus_pelayanan_gambar');

        // Jenis Jenis Pelayanan
        Route::get('jenis_pelayanan', [JenisPelayananController::class, 'index'])->name('jenis_pelayanan');
        Route::get('add_jenis_pelayanan', [JenisPelayananController::class, 'create'])->name('add_jenis_pelayanan');
        Route::POST('store_jenis_pelayanan', [JenisPelayananController::class, 'store'])->name('store_jenis_pelayanan');
        Route::get('edit_jenis_pelayanan/{id}', [JenisPelayananController::class, 'edit'])->name('edit_jenis_pelayanan');
        Route::POST('update_jenis_pelayanan/{id}', [JenisPelayananController::class, 'update'])->name('update_jenis_pelayanan');
        Route::POST('hapus_jenis_pelayanan', [JenisPelayananController::class, 'destroy'])->name('hapus_jenis_pelayanan');

        // Gambar Jenis Jenis Pelayanan
        Route::get('show_jenis_pelayanan_gambar/{id}', [GambarJenisPelayananController::class, 'index'])->name('show_jenis_pelayanan_gambar');
        Route::get('create_jenis_pelayanan_gambar/{id}', [GambarJenisPelayananController::class, 'create'])->name('create_jenis_pelayanan_gambar');
        Route::POST('store_jenis_pelayanan_gambar', [GambarJenisPelayananController::class, 'store'])->name('store_jenis_pelayanan_gambar');
        Route::get('edit_jenis_pelayanan_gambar/{id}', [GambarJenisPelayananController::class, 'edit'])->name('edit_jenis_pelayanan_gambar');
        Route::POST('update_jenis_pelayanan_gambar/{id}', [GambarJenisPelayananController::class, 'update'])->name('update_jenis_pelayanan_gambar');
        Route::POST('hapus_jenis_pelayanan_gambar', [GambarJenisPelayananController::class, 'destroy'])->name('hapus_jenis_pelayanan_gambar');

        // Mekanisme Alur
        Route::get('mekanisme_alur', [MekanismeAlurController::class, 'index'])->name('mekanisme_alur');
        Route::get('edit_mekanisme/{id}', [MekanismeAlurController::class, 'edit'])->name('edit_mekanisme');
        Route::POST('update_mekanisme/{id}', [MekanismeAlurController::class, 'update'])->name('update_mekanisme');

        // SK Petugas Pengaduan
        Route::get('sk_petugas_pengaduan', [SKPetugasPengaduan::class, 'index'])->name('sk_petugas_pengaduan');
        Route::get('add_petugas_pengaduan', [SKPetugasPengaduan::class, 'create'])->name('add_petugas_pengaduan');
        Route::POST('store_petugas_pengaduan', [SKPetugasPengaduan::class, 'store'])->name('store_petugas_pengaduan');
        Route::get('edit_petugas_pengaduan/{id}', [SKPetugasPengaduan::class, 'edit'])->name('edit_petugas_pengaduan');
        Route::POST('update_petugas_pengaduan/{id}', [SKPetugasPengaduan::class, 'update'])->name('update_petugas_pengaduan');
        Route::POST('hapus_petugas_pengaduan', [SKPetugasPengaduan::class, 'destroy'])->name('hapus_petugas_pengaduan');

        // SK Kompensasi
        Route::get('sk_kompensasi', [SKKompensasiController::class, 'index'])->name('sk_kompensasi');
        Route::get('add_kompensasi', [SKKompensasiController::class, 'create'])->name('add_kompensasi');
        Route::POST('store_kompensasi', [SKKompensasiController::class, 'store'])->name('store_kompensasi');
        Route::get('edit_kompensasi/{id}', [SKKompensasiController::class, 'edit'])->name('edit_kompensasi');
        Route::POST('update_kompensasi/{id}', [SKKompensasiController::class, 'update'])->name('update_kompensasi');
        Route::POST('hapus_kompensasi', [SKKompensasiController::class, 'destroy'])->name('hapus_kompensasi');

        // SK Kompensasi
        Route::get('publikasi_ikm', [PublikasiIkmController::class, 'index'])->name('publikasi_ikm');
        Route::get('add_ikm', [PublikasiIkmController::class, 'create'])->name('add_ikm');
        Route::POST('store_ikm', [PublikasiIkmController::class, 'store'])->name('store_ikm');
        Route::get('edit_ikm/{id}', [PublikasiIkmController::class, 'edit'])->name('edit_ikm');
        Route::POST('update_ikm/{id}', [PublikasiIkmController::class, 'update'])->name('update_ikm');
        Route::POST('hapus_ikm', [PublikasiIkmController::class, 'destroy'])->name('hapus_ikm');

        // Jadwal Pelayanan
        Route::get('jadwal_pelayanan', [JadwalPelayananController::class, 'index'])->name('jadwal_pelayanan');
        Route::get('add_jadwal', [JadwalPelayananController::class, 'create'])->name('add_jadwal');
        Route::POST('store_jadwal', [JadwalPelayananController::class, 'store'])->name('store_jadwal');
        Route::get('edit_jadwal/{id}', [JadwalPelayananController::class, 'edit'])->name('edit_jadwal');
        Route::POST('update_jadwal/{id}', [JadwalPelayananController::class, 'update'])->name('update_jadwal');
        Route::POST('hapus_jadwal', [JadwalPelayananController::class, 'destroy'])->name('hapus_jadwal');

        // Tarif Pelayanan
        Route::get('tarif_pelayanan', [TarifPelayananController::class, 'index'])->name('tarif_pelayanan');
        Route::get('add_tarif', [TarifPelayananController::class, 'create'])->name('add_tarif');
        Route::POST('store_tarif', [TarifPelayananController::class, 'store'])->name('store_tarif');
        Route::get('edit_tarif/{id}', [TarifPelayananController::class, 'edit'])->name('edit_tarif');
        Route::POST('update_tarif/{id}', [TarifPelayananController::class, 'update'])->name('update_tarif');
        Route::POST('hapus_tarif', [TarifPelayananController::class, 'destroy'])->name('hapus_tarif');

        // Informasi Puskesmas
        Route::get('informasi_puskesmas', [InformasiPuskesmasController::class, 'index'])->name('informasi_puskesmas');
        Route::get('edit_informasi/{id}', [InformasiPuskesmasController::class, 'edit'])->name('edit_informasi');
        Route::POST('update_informasi/{id}', [InformasiPuskesmasController::class, 'update'])->name('update_informasi');

        // Laporan IKM & SKM
        Route::get('laporan_ikm', [LaporanController::class, 'laporan_ikm'])->name('laporan_ikm');
        Route::get('laporan_skm', [LaporanController::class, 'laporan_skm'])->name('laporan_skm');
        Route::get('export_exel', [LaporanController::class, 'export_exel'])->name('export_exel');
        Route::get('export_exel_hasil_skm', [LaporanController::class, 'export_exel_skm'])->name('export_exel_hasil');

        // Pegawai Favorit
        Route::get('pegawai_favorit/{id}', [PegawaiFavoritController::class, 'pegawaiFavorit'])->name('pegawai_favorit');

        // Tanya Jawab
        Route::get('tanya_jawab', [TanyaJawabController::class, 'index'])->name('tanya_jawab');
    });
});
