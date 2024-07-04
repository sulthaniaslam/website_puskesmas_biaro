<?php

namespace App\Http\Controllers;

use App\Models\MekanismeAlur;
use App\Models\SK_Kompensasi;
use App\Models\SK_PetugasPengaduan;
use Illuminate\Http\Request;

class UserPengaduanController extends Controller
{
    public function UserMekanisme_alur()
    {
        $indexs = MekanismeAlur::all();
        return view('frontend.pengaduan.mekanisme_alur', compact('indexs'));
        // return view('frontend.pengaduan.mekanisme_alur');
    }

    public function UserSKPetugas_Pengaduan()
    {
        $index_sk_pengaduan = SK_PetugasPengaduan::first();
        return view('frontend.pengaduan.sk_pengaduan', compact('index_sk_pengaduan'));
    }

    public function UserSK_kompensasi()
    {
        $index_sk_kompensasi = SK_Kompensasi::first();
        return view('frontend.pengaduan.sk_kompensasi', compact('index_sk_kompensasi'));
    }
}
