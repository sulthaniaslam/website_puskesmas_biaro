<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelayanan;
use App\Models\JenisPelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class JadwalPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indexs = JadwalPelayanan::all();
        return view('backend.jadwal_pelayanan.index', compact('indexs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.jadwal_pelayanan.create');
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
            'gambarJadwalPelayanan' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        if ($request->file('gambarJadwalPelayanan')) {
            $gambarJadwalInsert = time();
            // Upload file dengan Helpers Laravel
            $InsertData = uploadImage($request->file('gambarJadwalPelayanan'), 'images/jadwal_pelayanan/', $gambarJadwalInsert);
        }

        JadwalPelayanan::create([
            'gambar_jadwal' => $InsertData,
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
        $edit_jadwal_pelayanan = Crypt::decrypt($id);
        // dd($edit_jadwal_pelayanan);
        $edit = JadwalPelayanan::where('id_jadwal_pelayanan', $edit_jadwal_pelayanan)->first();
        // dd($edit);
        return view('backend.jadwal_pelayanan.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->file('gambarJadwalPelayanan')) {
            $update_gambar_jadwal_pelayanan = time();

            // delete gambar awal ketika di update gambar baru
            $gambar_file = JadwalPelayanan::findOrFail($id);
            File::delete(public_path() . '/images/jadwal_pelayanan/' . $gambar_file->gambar_pelayanan);

            $update_gambar = uploadImage($request->file('gambarJadwalPelayanan'), 'images/jadwal_pelayanan/', $update_gambar_jadwal_pelayanan);

            JadwalPelayanan::where('id_jadwal_pelayanan', $id)->update([
                'gambar_jadwal' => $update_gambar,
            ]);
        }

        return response()->json(['success' => 'Gambar Jadwal Pelayanan Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = JadwalPelayanan::where('id_jadwal_pelayanan', $request->id_hapus)->first();
        File::delete(public_path() . '/images/jadwal_pelayanan/' . $delete->gambar_jadwal);
        $delete->delete();
        return response()->json(['success' => 'Gambar Jadwal Pelayanan Berhasil Dihapus']);
    }
}
