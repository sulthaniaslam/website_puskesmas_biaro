<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaklumatPelayanan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class MaklumatPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indexs = MaklumatPelayanan::all();
        return view('backend.maklumat_pelayanan.index', compact('indexs'));
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
        $edit = MaklumatPelayanan::where('id_maklumat_pelayanan', $id_edit)->first();
        return view('backend.maklumat_pelayanan.edit', compact('edit'));
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
        $update = MaklumatPelayanan::where('id_maklumat_pelayanan', $id)->first();
        $update->judul_maklumat_pelayan = $request->judul_maklumat_pelayan;
        $update->save();

        if ($request->file('gambarMaklumatPelayanan')) {
            $update_maklumat_time = time();

            // delete gambar awal ketika di update gambar baru
            $gambar_file = MaklumatPelayanan::findOrFail($id);
            File::delete(public_path() . '/images/maklumat_pelayanan/' . $gambar_file->gambar_maklumat_pelayanan);

            $updateMaklumat = uploadImage($request->file('gambarMaklumatPelayanan'), 'images/maklumat_pelayanan/', $update_maklumat_time);

            MaklumatPelayanan::where('id_maklumat_pelayanan', $id)->update([
                'gambar_maklumat_pelayanan' => $updateMaklumat,
            ]);
        }

        return response()->json(['success' => 'Maklumat Pelayanan Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
