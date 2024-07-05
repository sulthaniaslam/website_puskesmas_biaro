<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\BerkasPublik;
use App\Models\InformasiPuskesmas;
use App\Models\JadwalPelayanan;
use App\Models\JenisPelayanan;
use App\Models\MaklumatPelayanan;
use App\Models\PegawaiPuskesmas;
use App\Models\ProfilePuskesmas;
use App\Models\StandardPelayanan;
use App\Models\TarifPelayanan;
use App\Models\VisiMisi;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HalamanUtamaController extends Controller
{
    public function halaman_utama()
    {
        $allBerkas = BerkasPublik::first();
        $allBerita = Berita::limit(3)->orderBy('id_berita', 'desc')->get();
        $informasi = InformasiPuskesmas::first();
        $tarifPelayanan = TarifPelayanan::get();
        $jadwalPelayanan = JadwalPelayanan::get();
        $pegawaiFavorit = PegawaiPuskesmas::where('is_favorit', true)->get();
        $pertanyaan = DB::table('pertanyaan')->orderBy('created_at', 'desc')->paginate(5);

        return view('frontend.index', compact('allBerita', 'allBerkas', 'informasi', 'tarifPelayanan', 'jadwalPelayanan', 'pegawaiFavorit', 'pertanyaan'));

        // return view('frontend.index');
        // return view('layouts.user');
    }

    public function ajaxSejarah()
    {
        $profile = ProfilePuskesmas::first();
        return response($profile);
        // return response()
    }

    public function ajaxVisiMisi()
    {
        $visi_misi = VisiMisi::first();
        return response($visi_misi);
        // return response()
    }

    public function ajaxPegawai()
    {
        $pegawai = PegawaiPuskesmas::get();
        // dd($pegawai);
        return $pegawai;
    }

    public function ajaxStandardLayanan()
    {
        $StandardPelayanan = StandardPelayanan::all();
        // return $StandardPelayanan;
        $map = collect($StandardPelayanan)->map(function ($q) {
            return [
                'id_standard_pelayanan' => Crypt::encrypt($q->id_standard_pelayanan),
                'judul_standard_pelayanan' => $q->judul_standard_pelayanan,
            ];
        });

        return response($map);
    }

    public function ajaxJenisPelayanan()
    {
        $JenisPelayanan = JenisPelayanan::all();
        // return $JenisPelayanan;
        $map_jenis = collect($JenisPelayanan)->map(function ($q) {
            return [
                'id_jenis_pelayanan' => Crypt::encrypt($q->id_jenis_pelayanan),
                'judul_jenis_pelayanan' => $q->judul_jenis_pelayanan,
            ];
        });

        return response($map_jenis);
    }

    public function ajaxMaklumat()
    {
        $maklumat = MaklumatPelayanan::first();
        return response($maklumat);
        // return response()
    }


    // Tanya Jawab
    public function kirimPertanyaan(Request $request){
        // return $request->all();
        DB::table('pertanyaan')->insert([
            'nama'          => $request->nama,
            'pertanyaan'    => $request->pertanyaan,
            'created_at'    => now(),
        ]);

        return redirect()->route('/')->with('message', 'Pertanyaan berhasil dikirim');
    }
}
