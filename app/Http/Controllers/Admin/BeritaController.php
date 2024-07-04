<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beritas = Berita::all();
        return view('backend.berita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.berita.create');
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
            'gambar_berita' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'judul_berita' => 'required',
            'isi_berita' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        if ($request->file('gambar_berita')) {
            $GambarName = time();

            $imageBerita = uploadImage($request->file('gambar_berita'), 'images/berita/', $GambarName);
        }
        setlocale(LC_ALL, 'id_ID');
        date_default_timezone_set("Asia/Jakarta");

        $tanggal = date('Y-m-d');
        $day = date('D', strtotime($tanggal));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );

        Berita::create([
            'judul_berita' => $request->judul_berita,
            'isi_berita' => $request->isi_berita,
            'hari_berita' => $dayList[$day],
            'gambar_berita' => $imageBerita,
            'slug_berita' => Str::slug($request->judul_berita),
        ]);


        return response()->json(['success' => 'Berita Puskesmas Berhasil Disimpan']);
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
        $berita = Berita::where('id_berita', $id_edit)->first();
        return view('backend.berita.edit', compact('berita'));
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
        $update = Berita::where('id_berita', $id)->first();
        $update->judul_berita = $request->judul_berita;
        $update->isi_berita = $request->isi_berita;
        $update->slug_berita = Str::slug($request->judul_berita);
        $update->save();

        if ($request->file('gambar_berita')) {
            $UpdateGambarName = time();

            // delete gambar awal ketika di update gambar baru
            $fileGambar = Berita::findOrFail($id);
            File::delete(public_path() . '/images/berita/' . $fileGambar->gambar_berita);

            $imageBerita = uploadImage($request->file('gambar_berita'), 'images/berita/', $UpdateGambarName);

            Berita::where('id_berita', $id)->update([
                'gambar_berita' => $imageBerita,
            ]);
        }

        return response()->json(['success' => 'Berita Puskesmas Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Berita::where('id_berita', $id)->first();
        File::delete(public_path() . '/images/berita/' . $delete->gambar_berita);
        $delete->delete();
        return response()->json(['success' => 'Berita Berhasil Dihapus']);
    }
}
