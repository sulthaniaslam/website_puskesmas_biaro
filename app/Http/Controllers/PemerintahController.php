<?php

namespace App\Http\Controllers;

use App\Models\LembagaNagari;
use App\Models\PerangkatNagari;
use App\Models\ProfileNagari;
use App\Models\ProfileWaliNagari;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class PemerintahController extends Controller
{
    public function profile_nagari()
    {
        $profile_nagari = ProfileNagari::get();
        return view('frontend.pemerintah.profile_nagari', compact('profile_nagari'));
    }

    public function sejarah_nagari()
    {
        $sejarah_nagari = ProfileNagari::select('gambar_sejarah', 'sejarah_nagari')->get();
        return view('frontend.pemerintah.sejarah_nagari', compact('sejarah_nagari'));
    }

    public function struktur_organisasi()
    {
        $struktur_organisasi = ProfileNagari::get();
        return view('frontend.pemerintah.struktur_organisasi', compact('struktur_organisasi'));
    }

    public function visi_misi()
    {
        $VisiMisi = VisiMisi::all();
        return view('frontend.pemerintah.visi_misi', compact('VisiMisi'));
    }

    public function perangkat_nagari()
    {
        $PerangkatNagari = PerangkatNagari::leftjoin('detail_perangkat_nagari', 'perangkat_nagari.id_perangkat_nagari', '=', 'detail_perangkat_nagari.id_perangkat_nagari')->get();
        // dd($PerangkatNagari);
        return view('frontend.pemerintah.perangkat_nagari', compact('PerangkatNagari'));
    }

    public function wali_nagari()
    {
        $ProfileWaliNagari = ProfileWaliNagari::all();
        return view('frontend.pemerintah.profile_wali_nagari', compact('ProfileWaliNagari'));
    }

    public function lembaga_nagari()
    {
        $LembagaNagari = LembagaNagari::all();
        return view('frontend.pemerintah.lembaga_nagari', compact('LembagaNagari'));
    }
}
