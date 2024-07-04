<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GambarStandarPelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class GambarStandardPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $id_standard_pelayanan = Crypt::decrypt($id);
        $indexs = GambarStandarPelayanan::where('id_standard_pelayanan', $id_standard_pelayanan)->get();
        return view('backend.gambar_standard_pelayanan.index', compact('indexs', 'id_standard_pelayanan', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id_standard = Crypt::decrypt($id);
        return view('backend.gambar_standard_pelayanan.create', compact('id', 'id_standard'));
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
            'gambarStandardPelayanan' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'id_standard_pelayanan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        if ($request->file('gambarStandardPelayanan')) {
            $gambarStandard = time();
            // Upload file dengan Helpers Laravel
            $updateStruktur = uploadImage($request->file('gambarStandardPelayanan'), 'images/standard_pelayanan/', $gambarStandard);
        }

        GambarStandarPelayanan::create([
            'id_standard_pelayanan' => $request->id_standard_pelayanan,
            'gambar_standard_pelayanan' => $updateStruktur,
        ]);

        return response()->json(['success' => 'Gambar Standard Pelayanan Berhasil Disimpan']);
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
        $edit = GambarStandarPelayanan::where('id_gambar_standard_pelayanan', $id_edit)->first();
        $id_standard_pelayanan = $edit->id_standard_pelayanan;
        $id_standard_pelayanan = Crypt::encrypt($edit->id_standard_pelayanan);
        return view('backend.gambar_standard_pelayanan.edit', compact('edit', 'id_standard_pelayanan'));
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
        if ($request->file('gambarStandardPelayanan')) {
            $update_gambar_standard_pelayanan = time();

            // delete gambar awal ketika di update gambar baru
            $gambar_file = GambarStandarPelayanan::findOrFail($id);
            File::delete(public_path() . '/images/standard_pelayanan/' . $gambar_file->gambar_standard_pelayanan);

            $update_gambar = uploadImage($request->file('gambarStandardPelayanan'), 'images/standard_pelayanan/', $update_gambar_standard_pelayanan);

            GambarStandarPelayanan::where('id_gambar_standard_pelayanan', $id)->update([
                'gambar_standard_pelayanan' => $update_gambar,
            ]);
        }

        return response()->json(['success' => 'Gambar Standard Pelayanan Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = GambarStandarPelayanan::where('id_gambar_standard_pelayanan', $request->id_hapus)->first();
        File::delete(public_path() . '/images/standard_pelayanan/' . $delete->gambar_standard_pelayanan);
        $delete->delete();
        return response()->json(['success' => 'Gambar Standard Pelayanan Berhasil Dihapus']);
    }
}
