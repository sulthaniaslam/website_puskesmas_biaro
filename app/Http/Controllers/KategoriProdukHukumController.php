<?php

namespace App\Http\Controllers;

use App\Models\KategoriProdukHukum;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class KategoriProdukHukumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris =  KategoriProdukHukum::all();
        return view('backend.kategori_produk_hukum.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.kategori_produk_hukum.create');
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
            'kategori_produk_hukum' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        KategoriProdukHukum::create([
            'kategori_produk_hukum' => $request->kategori_produk_hukum,
        ]);

        return response()->json(['success' => 'Kategori Produk Hukum Berhasil Ditambah']);
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
        $edit = KategoriProdukHukum::where('id_kategori_produk_hukum', $id_edit)->first();
        return view('backend.kategori_produk_hukum.edit', compact('edit'));
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
        KategoriProdukHukum::where('id_kategori_produk_hukum', $id)->update([
            'kategori_produk_hukum' => $request->kategori_produk_hukum
        ]);

        return response()->json(['success' => 'Kategori Produk Hukum Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = KategoriProdukHukum::where('id_kategori_produk_hukum', $id)->first();
        $delete->delete();
        return response()->json(['success' => 'Kategori Produk Hukum Berhasil Dihapus']);
    }
}
