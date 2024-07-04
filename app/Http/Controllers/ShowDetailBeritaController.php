<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class ShowDetailBeritaController extends Controller
{
    public function detail_berita($slug_berita)
    {
        // mencari berita utama
        $detail_berita = Berita::where('slug_berita', $slug_berita)->first();
        $allBerita = Berita::orderBy('id_berita', 'desc')->limit(3)->get();
        return view('frontend.detail_berita.detail', compact('detail_berita', 'allBerita'));
    }

    public function download_file($id)
    {
        $id_download = Crypt::decrypt($id);
        $download_file = Berita::where('id_berita', $id_download)->first();
        return view('frontend.detail_berita.download', compact('download_file'));
    }

    public function semua_berita()
    {
        $SemuaBerita = Berita::orderBy('id_berita', 'desc')->paginate(5);
        $allBerita = Berita::orderBy('id_berita', 'desc')->limit(3)->get();
        return view('frontend.detail_berita.semua_berita', compact('SemuaBerita', 'allBerita'));
    }
}
