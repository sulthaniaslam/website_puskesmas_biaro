<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\PegawaiPuskesmas;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $pegawai = PegawaiPuskesmas::count();
        $berita = Berita::count();
        return view('backend.dashboard', compact('pegawai', 'berita'));
    }
}
