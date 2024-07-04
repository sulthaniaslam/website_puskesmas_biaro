<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileWaliNagari;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProfileWaliNagariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indexs = ProfileWaliNagari::all();
        return view('backend.profile_wali_nagari.index', compact('indexs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.profile_wali_nagari.create');
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
            'gambarWaliNagari' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'nama_wali_nagari' => 'required',
            'gelar' => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'status_perkawinan' => 'required',
            'agama' => 'required',
            'keluarga'  => 'required',
            'kontak'    => 'required',
            'pendidikan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        if ($request->file('gambarWaliNagari')) {
            $gambarWali = time();

            $imageWali = uploadImage($request->file('gambarWaliNagari'), 'images/walinagari/', $gambarWali);
        }
        ProfileWaliNagari::create([
            'gambar_wali_nagari' => $imageWali,
            'nama_wali_nagari' => $request->nama_wali_nagari,
            'gelar' => $request->gelar,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'status_perkawinan' => $request->status_perkawinan,
            'agama' => $request->agama,
            'keluarga' => $request->keluarga,
            'kontak' => $request->kontak,
            'pendidikan' => $request->pendidikan,
        ]);

        return response()->json(['success' => 'Profile Wali Nagari Berhasil Ditambah']);
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
        $edit = ProfileWaliNagari::where('id_profile_wali_nagari', $id_edit)->first();
        return view('backend.profile_wali_nagari.edit', compact('edit'));
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
        $update = ProfileWaliNagari::where('id_profile_wali_nagari', $id)->first();
        $update->nama_wali_nagari = $request->nama_wali_nagari;
        $update->gelar = $request->gelar;
        $update->tempat_lahir = $request->tempat_lahir;
        $update->tanggal_lahir = $request->tanggal_lahir;
        $update->status_perkawinan = $request->status_perkawinan;
        $update->agama = $request->agama;
        $update->keluarga = $request->keluarga;
        $update->kontak = $request->kontak;
        $update->pendidikan = $request->pendidikan;
        $update->save();

        if ($request->file('gambarWaliNagari')) {
            $update_time_Wali = time();

            // delete gambar awal ketika di update gambar baru
            $gambar_file = ProfileWaliNagari::findOrFail($id);
            File::delete(public_path() . '/images/walinagari/' . $gambar_file->gambarWaliNagari);

            $updateWali = uploadImage($request->file('gambarWaliNagari'), 'images/walinagari/', $update_time_Wali);

            ProfileWaliNagari::where('id_profile_wali_nagari', $id)->update([
                'gambar_wali_nagari' => $updateWali,
            ]);
        }

        return response()->json(['success' => 'Profile Wali Nagari Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = ProfileWaliNagari::where('id_profile_wali_nagari', $id)->first();
        File::delete(public_path() . '/images/walinagari/' . $delete->gambarWaliNagari);
        $delete->delete();
        return response()->json(['success' => 'Profile Wali Nagari Berhasil Dihapus']);
    }
}
