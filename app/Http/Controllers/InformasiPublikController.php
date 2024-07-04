<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class InformasiPublikController extends Controller
{
    public function informasi_publik()
    {
        $informasi_Publik = Berita::where('kategori_berita', 'informasi_publik')->get();
        return view('frontend.informasi_publik.informasi', compact('informasi_Publik'));
    }
}
