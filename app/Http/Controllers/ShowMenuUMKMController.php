<?php

namespace App\Http\Controllers;

use App\Models\UMKMNAGARI;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class ShowMenuUMKMController extends Controller
{
    public function menu_umkm($id)
    {
        $id_umkm = Crypt::decrypt($id);
        $UMKMNAGARI = UMKMNAGARI::leftjoin('menu_umkm', 'umkm_nagari.id_umkm', '=', 'menu_umkm.id_umkm')->where('umkm_nagari.id_umkm', $id_umkm)->get();
        $nama_umkm = UMKMNAGARI::where('id_umkm', $id_umkm)->select('nama_umkm')->first();
        return view('frontend.UMKM.menu_umkm', compact('UMKMNAGARI', 'nama_umkm'));
    }
}
