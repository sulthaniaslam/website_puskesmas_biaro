<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SK_Kompensasi;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SKKompensasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indexs = SK_Kompensasi::orderBy('id_sk_kompensasi', 'desc')->get();
        return view('backend.sk_kompensasi.index', compact('indexs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sk_kompensasi.create');
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
            'file_sk_kompensasi' => 'required|mimes:pdf',
            'keterangan_kompensasi' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        if ($request->file('file_sk_kompensasi')) {
            $fileKompensasi = time();

            $fileKompensasiInsert = uploadFile($request->file('file_sk_kompensasi'), 'file/sk_kompensasi/', $fileKompensasi);
        }

        SK_Kompensasi::create([
            'keterangan_sk_kompensasi' => $request->keterangan_kompensasi,
            'file_sk_kompensasi' => $fileKompensasiInsert,
        ]);

        return response()->json(['success' => 'SK Kompensasi Berhasil Ditambah']);
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
        $edit = SK_Kompensasi::where('id_sk_kompensasi', $id_edit)->first();
        return view('backend.sk_kompensasi.edit', compact('edit'));
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
        $update = SK_Kompensasi::where('id_sk_kompensasi', $id)->first();
        $update->keterangan_sk_kompensasi = $request->keterangan_kompensasi;
        $update->save();


        if ($request->file('file_sk_kompensasi')) {
            $fileKompensasi = time();

            // delete gambar awal ketika di update gambar baru
            $filePDF = SK_Kompensasi::findOrFail($id);
            File::delete(public_path() . '/file/sk_kompensasi/' . $filePDF->file_sk_kompensasi);
            $fileKompensasiUpdate = uploadFile($request->file('file_sk_kompensasi'), 'file/sk_kompensasi/', $fileKompensasi);

            SK_Kompensasi::where('id_sk_kompensasi', $id)->update([
                'file_sk_kompensasi' => $fileKompensasiUpdate,
            ]);
        }

        return response()->json(['success' => 'SK Kompensasi Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = SK_Kompensasi::where('id_sk_kompensasi', $request->id_hapus)->first();
        File::delete(public_path() . '/file/sk_kompensasi/' . $delete->file_sk_kompensasi);
        $delete->delete();
        return response()->json(['success' => 'SK Kompesasi Berhasil Dihapus']);
    }
}
