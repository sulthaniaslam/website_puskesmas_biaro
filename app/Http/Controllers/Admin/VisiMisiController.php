<?php

namespace App\Http\Controllers\Admin;

use App\Models\VisiMisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indexs = VisiMisi::all();
        return view('backend.visi_misi.index', compact('indexs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.visi_misi.create');
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
            'gambarVisi' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'judul_visi' => 'required',
            'visi_nagari' => 'required',
            'judul_misi' => 'required',
            'misi_nagari' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $VisiMisi = new VisiMisi;
        $VisiMisi->judul_visi = $request->judul_visi;
        $VisiMisi->keterangan_visi = $request->visi_nagari;
        $VisiMisi->judul_misi = $request->judul_misi;
        $VisiMisi->keterangan_misi = $request->misi_nagari;

        if ($request->file('gambarVisi')) {
            $gambarVisi = time();

            $imageProfile = uploadImage($request->file('gambarVisi'), 'images/visi_misi/', $gambarVisi);
            $VisiMisi->gambar_visi_misi = $imageProfile;
        }

        $VisiMisi->save();
        return response()->json(['success' => 'Visi Misi Berhasil Diupdate']);
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
        $edit = VisiMisi::where('id_visi_misi', $id_edit)->first();
        return view('backend.visi_misi.edit', compact('edit'));
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
        $update = VisiMisi::where('id_visi_misi', $id)->first();
        $update->judul_visi = $request->judul_visi;
        $update->keterangan_visi = $request->visi_nagari;
        $update->judul_misi = $request->judul_misi;
        $update->keterangan_misi = $request->misi_nagari;
        $update->save();
        return response()->json(['success' => 'Visi Misi Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = VisiMisi::where('id_visi_misi', $id)->first();
        File::delete(public_path() . '/images/visi_misi/' . $delete->gambar_visi_misi);
        $delete->delete();
        return response()->json(['success' => 'Visi Misi Berhasil Dihapus']);
    }
}
