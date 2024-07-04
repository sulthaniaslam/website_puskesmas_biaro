<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\StandardPelayanan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class StandardPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indexs = StandardPelayanan::all();
        return view('backend.standard_pelayanan.index', compact('indexs'));
    }

    public function create()
    {
        return view('backend.standard_pelayanan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul_standard_pelayanan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        StandardPelayanan::insert([
            'judul_standard_pelayanan' => $request->judul_standard_pelayanan,
        ]);

        return response()->json(['success' => 'Standard Pelayanan Berhasil Disimpan']);
    }

    public function edit($id)
    {
        $id_edit = Crypt::decrypt($id);
        $edit = StandardPelayanan::where('id_standard_pelayanan', $id_edit)->first();
        return view('backend.standard_pelayanan.edit', compact('edit', 'id_edit'));
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
        $update = StandardPelayanan::where('id_standard_pelayanan', $id)->first();
        $update->judul_standard_pelayanan = $request->judul_standard_pelayanan;
        $update->save();
        return response()->json(['success' => 'Standard Pelayanan Publik Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = StandardPelayanan::where('id_standard_pelayanan', $request->id_hapus)->first();
        $delete->delete();
        return response()->json(['success' => 'Standard Pelayanan Publik Berhasil Dihapus']);
    }
}
