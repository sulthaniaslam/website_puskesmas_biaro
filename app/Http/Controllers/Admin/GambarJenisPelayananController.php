<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GambarJenisPelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

use function PHPUnit\Framework\returnSelf;

class GambarJenisPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $id_jenis_pelayanan = Crypt::decrypt($id);
        $indexs = GambarJenisPelayanan::where('id_jenis_pelayanan', $id_jenis_pelayanan)->get();
        return view('backend.gambar_jenis_pelayanan.index', compact('indexs', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id_jenis_pelayanan = Crypt::decrypt($id);
        return view('backend.gambar_jenis_pelayanan.create', compact('id_jenis_pelayanan', 'id'));
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
            'gambarJenisPelayanan' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'id_jenis_pelayanan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        if ($request->file('gambarJenisPelayanan')) {
            $gambarJenis = time();
            // Upload file dengan Helpers Laravel
            $updateJenis = uploadImage($request->file('gambarJenisPelayanan'), 'images/jenis_pelayanan/', $gambarJenis);
        }

        GambarJenisPelayanan::create([
            'id_jenis_pelayanan' => $request->id_jenis_pelayanan,
            'gambar_jenis_pelayanan' => $updateJenis,
        ]);

        return response()->json(['success' => 'Gambar Jenis Pelayanan Berhasil Disimpan']);
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
        $edit_jenis_pelayanan = Crypt::decrypt($id);
        $edit = GambarJenisPelayanan::where('id_gambar_jenis_pelayanan', $edit_jenis_pelayanan)->first();
        $id_jenis_pelayanan = $edit->id_jenis_pelayanan;
        $id_jenis_pelayanan = Crypt::encrypt($edit->id_jenis_pelayanan);
        return view('backend.gambar_jenis_pelayanan.edit', compact('edit', 'id_jenis_pelayanan'));
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
        if ($request->file('gambarJenisPelayanan')) {
            $update_gambar_jenis_pelayanan = time();

            // delete gambar awal ketika di update gambar baru
            $gambar_file = GambarJenisPelayanan::findOrFail($id);
            File::delete(public_path() . '/images/jenis_pelayanan/' . $gambar_file->gambar_jenis_pelayanan);

            $update_gambar = uploadImage($request->file('gambarJenisPelayanan'), 'images/jenis_pelayanan/', $update_gambar_jenis_pelayanan);

            GambarJenisPelayanan::where('id_gambar_jenis_pelayanan', $id)->update([
                'gambar_jenis_pelayanan' => $update_gambar,
            ]);
        }

        return response()->json(['success' => 'Gambar Jenis Pelayanan Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = GambarJenisPelayanan::where('id_gambar_jenis_pelayanan', $request->id_hapus)->first();
        File::delete(public_path() . '/images/jenis_pelayanan/' . $delete->gambar_jenis_pelayanan);
        $delete->delete();
        return response()->json(['success' => 'Gambar Jenis Pelayanan Berhasil Dihapus']);
    }
}
