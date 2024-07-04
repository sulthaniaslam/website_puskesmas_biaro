<?php

namespace App\Http\Controllers\Admin;

use App\Models\BerkasPublik;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;

class BerkasPublikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berkaspublik = BerkasPublik::all();
        return view('backend.berkas_layanan_publik.index', compact('berkaspublik'));
    }

    public function edit($id)
    {
        $id_edit = Crypt::decrypt($id);
        $edit = BerkasPublik::where('id_berkas_layanan_publik', $id_edit)->first();
        return view('backend.berkas_layanan_publik.edit', compact('edit'));
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
        $update = BerkasPublik::where('id_berkas_layanan_publik', $id)->first();
        $update->keterangan_berkas = $request->keterangan_berkas;
        $update->save();
        if ($request->file('gambarBerkas')) {
            $update_time = time();

            // delete gambar awal ketika di update gambar baru
            $gambar_file = BerkasPublik::findOrFail($id);
            File::delete(public_path() . '/images/berkas_layanan_publik/' . $gambar_file->gambar_berkas);

            $updateBerkas = uploadImage($request->file('gambarBerkas'), 'images/berkas_layanan_publik/', $update_time);

            BerkasPublik::where('id_berkas_layanan_publik', $id)->update([
                'gambar_berkas' => $updateBerkas,
            ]);
        }

        return response()->json(['success' => 'Berkas Layanan Publik Berhasil Diupdate']);
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
