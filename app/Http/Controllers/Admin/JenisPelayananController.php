<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisPelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class JenisPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indexs = JenisPelayanan::all();
        return view('backend.jenis_jenis_pelayanan.index', compact('indexs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.jenis_jenis_pelayanan.create');
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
            'judul_jenis_pelayanan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        JenisPelayanan::insert([
            'judul_jenis_pelayanan' => $request->judul_jenis_pelayanan,
        ]);

        return response()->json(['success' => 'Jenis Jenis Pelayanan Berhasil Disimpan']);
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
        $edit = JenisPelayanan::where('id_jenis_pelayanan', $id_edit)->first();
        return view('backend.jenis_jenis_pelayanan.edit', compact('edit', 'id_edit'));
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
        $update = JenisPelayanan::where('id_jenis_pelayanan', $id)->first();
        $update->judul_jenis_pelayanan = $request->judul_jenis_pelayanan;
        $update->save();
        return response()->json(['success' => 'JeniS Pelayanan Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = JenisPelayanan::where('id_jenis_pelayanan', $request->id_hapus)->first();
        $delete->delete();
        return response()->json(['success' => 'Jenis Pelayanan Berhasil Dihapus']);
    }
}
