<?php

namespace App\Http\Controllers;

use App\Models\GambarJenisPelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserJenisPelayananController extends Controller
{
    public function index($id)
    {
        $id_jenis_pelayanan = Crypt::decrypt($id);
        $indexs = GambarJenisPelayanan::where('id_jenis_pelayanan', $id_jenis_pelayanan)->get();

        return view('frontend.gambar_jenis_pelayanan.index', compact('indexs'));
    }
}
