<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TarifPelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TarifPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.tarif_pelayanan.index', [
            'indexs'    => TarifPelayanan::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.tarif_pelayanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'gambarTarifPelayanan' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        if ($request->file('gambarTarifPelayanan')) {
            $gambarJadwalInsert = time();
            // Upload file dengan Helpers Laravel
            $InsertData = uploadImage($request->file('gambarTarifPelayanan'), 'images/tarif_pelayanan/', $gambarJadwalInsert);
        }

        TarifPelayanan::create([
            'gambar_tarif' => $InsertData,
        ]);

        return response()->json(['success' => 'Gambar Tarif Pelayanan Berhasil Disimpan']);
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
        //
        $edit_tarif_pelayanan = Crypt::decrypt($id);
        // dd($edit_tarif_pelayanan);
        $edit = TarifPelayanan::where('id_tarif_pelayanan', $edit_tarif_pelayanan)->first();
        // dd($edit);
        return view('backend.tarif_pelayanan.edit', compact('edit'));
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
        //
        // dd($request->all());
        if ($request->file('gambarTarifPelayanan')) {
            $update_gambar_tarif = time();

            // delete gambar awal ketika di update gambar baru
            $gambar_file = TarifPelayanan::findOrFail($id);
            File::delete(public_path() . '/images/tarif_pelayanan/' . $gambar_file->gambar_tarif);

            $update_gambar = uploadImage($request->file('gambarTarifPelayanan'), 'images/tarif_pelayanan/', $update_gambar_tarif);

            TarifPelayanan::where('id_tarif_pelayanan', $id)->update([
                'gambar_tarif' => $update_gambar,
            ]);
        }

        return response()->json(['success' => 'Gambar Tarif Pelayanan Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = TarifPelayanan::where('id_tarif_pelayanan', $request->id_hapus)->first();
        File::delete(public_path() . '/images/tarif_pelayanan/' . $delete->gambar_tarif);
        $delete->delete();
        return response()->json(['success' => 'Gambar Tarif Pelayanan Berhasil Dihapus']);
    }
}
