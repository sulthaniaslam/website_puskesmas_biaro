<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\SK_PetugasPengaduan;

class SKPetugasPengaduan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indexs = SK_PetugasPengaduan::orderBy('id_sk_petugas_pengaduan', 'desc')->get();
        return view('backend.sk_petugas_pengaduan.index', compact('indexs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sk_petugas_pengaduan.create');
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
            'file_sk_petugas' => 'required|mimes:pdf',
            'keterangan_sk' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        if ($request->file('file_sk_petugas')) {
            $fileSK = time();

            $fileSKInsert = uploadFile($request->file('file_sk_petugas'), 'file/sk_petugas_pengaduan/', $fileSK);
        }

        SK_PetugasPengaduan::create([
            'keterangan_sk_petugas_pengaduan' => $request->keterangan_sk,
            'file_sk_petugas_pengaduan' => $fileSKInsert,
        ]);

        // upload manual

        // if ($request->file('file_sk_petugas')) {
        //     $fileSK = time();

        //     $file = $request->file('file_sk_petugas');

        //     $fileNamephp = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();

        //     $file->move(public_path('file/sk_petugas_pengaduan/'), $fileNamephp);
        // }

        // SK_PetugasPengaduan::create([
        //     'keterangan_sk_petugas_pengaduan' => $request->keterangan_sk,
        //     'file_sk_petugas_pengaduan' => $fileNamephp,
        // ]);

        return response()->json(['success' => 'SK Petugas Pengaduan Berhasil Ditambah']);
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
        $edit = SK_PetugasPengaduan::where('id_sk_petugas_pengaduan', $id_edit)->first();
        return view('backend.sk_petugas_pengaduan.edit', compact('edit'));
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
        $update = SK_PetugasPengaduan::where('id_sk_petugas_pengaduan', $id)->first();
        $update->keterangan_sk_petugas_pengaduan = $request->keterangan_sk;
        $update->save();

        if ($request->file('file_sk_petugas')) {
            $fileSK = time();

            // delete gambar awal ketika di update gambar baru
            $filePDF = SK_PetugasPengaduan::findOrFail($id);
            File::delete(public_path() . '/file/sk_petugas_pengaduan/' . $filePDF->file_sk_petugas_pengaduan);
            $fileSKUpdate = uploadFile($request->file('file_sk_petugas'), 'file/sk_petugas_pengaduan/', $fileSK);

            SK_PetugasPengaduan::where('id_sk_petugas_pengaduan', $id)->update([
                'file_sk_petugas_pengaduan' => $fileSKUpdate,
            ]);
        }

        return response()->json(['success' => 'SK Petugas Pengaduan Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = SK_PetugasPengaduan::where('id_sk_petugas_pengaduan', $request->id_hapus)->first();
        File::delete(public_path() . '/file/sk_petugas_pengaduan/' . $delete->file_sk_petugas_pengaduan);
        $delete->delete();
        return response()->json(['success' => 'SK Petugas Pengaduan Berhasil Dihapus']);
    }
}
