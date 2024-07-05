<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PegawaiPuskesmas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PegawaiPuskesmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PegawaiPuskesmas = PegawaiPuskesmas::select('id_pegawai', 'nama_lengkap', 'nip', 'golongan_jabatan', 'status_jabatan', 'foto_pegawai', 'is_favorit')
            ->orderBy('id_pegawai', 'desc')
            ->get();
        return view('backend.pegawai_puskesmas.index', compact('PegawaiPuskesmas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pegawai_puskesmas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fotoPegawaiPuskesmas' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'nama_lengkap' => 'required',
            'nip' => 'required',
            'golongan_jabatan' => 'required',
            'status_jabatan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        if ($request->file('fotoPegawaiPuskesmas')) {
            $GambarPegawai = time();

            $imagePegawai = uploadImage($request->file('fotoPegawaiPuskesmas'), 'images/pegawai_puskesmas/', $GambarPegawai);
        }

        PegawaiPuskesmas::create([
            'foto_pegawai' => $imagePegawai,
            'nama_lengkap' => $request->nama_lengkap,
            'nip' => $request->nip,
            'golongan_jabatan' => $request->golongan_jabatan,
            'status_jabatan' => $request->status_jabatan,
        ]);

        return response()->json(['success' => 'Pegawai Puskesmas Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_edit = Crypt::decrypt($id);

        $PegawaiPuskesmas = PegawaiPuskesmas::where('id_pegawai', $id_edit)->first();
        return view('backend.pegawai_puskesmas.edit', compact('PegawaiPuskesmas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = PegawaiPuskesmas::where('id_pegawai', $id)->first();
        $update->nama_lengkap = $request->nama_lengkap;
        $update->nip = $request->nip;
        $update->golongan_jabatan = $request->golongan_jabatan;
        $update->status_jabatan = $request->status_jabatan;
        $update->save();

        if ($request->file('fotoPegawaiPuskesmas')) {
            $GambarPegawai = time();

            // delete gambar awal ketika di update gambar baru
            $fileGambar = PegawaiPuskesmas::findOrFail($id);
            File::delete(public_path() . '/images/pegawai_puskesmas/' . $fileGambar->foto_umkm);

            $imagePegawai = uploadImage($request->file('fotoPegawaiPuskesmas'), 'images/pegawai_puskesmas/', $GambarPegawai);

            PegawaiPuskesmas::where('id_pegawai', $id)->update([
                'foto_pegawai' => $imagePegawai,
            ]);
        }

        return response()->json(['success' => 'Pegawai Puskesmas Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $delete = PegawaiPuskesmas::where('id_pegawai', $request->id_hapus)->first();
        File::delete(public_path() . '/images/pegawai_puskesmas/' . $delete->foto_pegawai);
        $delete->delete();
        return response()->json(['success' => 'Pegawai Puskesmas Berhasil Dihapus']);
    }
}
