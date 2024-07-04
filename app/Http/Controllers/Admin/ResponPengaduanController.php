<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengaduanMasyarakat;
use Illuminate\Http\Request;

class ResponPengaduanController extends Controller
{
    public function pengaduan_masyarakat()
    {
        $pengaduan_masyarakat = PengaduanMasyarakat::orderBy('id_pengaduan_masyarakat', 'desc')->get();
        return view('backend.pengaduan_masyarakat.pengaduan_masyarakat', compact('pengaduan_masyarakat'));
    }
}
