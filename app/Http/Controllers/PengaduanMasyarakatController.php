<?php

namespace App\Http\Controllers;

use App\Models\PengaduanMasyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class PengaduanMasyarakatController extends Controller
{
    public function pengaduan_masyarakat()
    {
        return view('frontend.pengaduan_masyarakat.index');
    }

    public function store_pengaduan_masyarakat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'nik' => 'required|unique:pengaduan_masyarakat,pengaduan',
            'email' => 'required',
            'jenis_pengaduan' => 'required',
            'pengaduan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $pengaduan = new PengaduanMasyarakat;
        $pengaduan->nama_lengkap = $request->nama_lengkap;
        $pengaduan->nik = Crypt::encrypt($request->nik);
        $pengaduan->email = $request->email;
        $pengaduan->jenis_pengaduan = $request->jenis_pengaduan;
        $pengaduan->pengaduan = $request->pengaduan;
        $pengaduan->save();

        return response()->json(['success' => 'Pengaduan Berhasil Dikirim']);
    }
}
