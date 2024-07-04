<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilePuskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;

class ProfilePuskesmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indexs = ProfilePuskesmas::all();
        return view('backend.profile_puskesmas.index', compact('indexs'));
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
        $edit = ProfilePuskesmas::where('id_profile_puskesmas', $id_edit)->first();
        return view('backend.profile_puskesmas.edit', compact('edit'));
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
        $update = ProfilePuskesmas::where('id_profile_puskesmas', $id)->first();
        $update->sejarah_puskesmas = $request->sejarah_puskesmas;
        $update->save();

        if ($request->file('gambarProfile')) {
            $update_profile_time = time();

            // delete gambar awal ketika di update gambar baru
            $gambar_file = ProfilePuskesmas::findOrFail($id);
            File::delete(public_path() . '/images/gambar_profile/' . $gambar_file->gambarStruktur);

            $updateProfile = uploadImage($request->file('gambarProfile'), 'images/gambar_profile/', $update_profile_time);

            ProfilePuskesmas::where('id_profile_puskesmas', $id)->update([
                'gambar_profile_puskesmas' => $updateProfile,
            ]);
        }

        if ($request->file('gambarStruktur')) {
            $update_time_Wali = time();

            // delete gambar awal ketika di update gambar baru
            $gambar_file = ProfilePuskesmas::findOrFail($id);
            File::delete(public_path() . '/images/struktur_puskesmas/' . $gambar_file->gambarStruktur);

            $updateStruktur = uploadImage($request->file('gambarStruktur'), 'images/struktur_puskesmas/', $update_time_Wali);

            ProfilePuskesmas::where('id_profile_puskesmas', $id)->update([
                'gambar_struktur_puskesmas' => $updateStruktur,
            ]);
        }

        return response()->json(['success' => 'Profile Puskesmas Berhasil Diupdate']);
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
