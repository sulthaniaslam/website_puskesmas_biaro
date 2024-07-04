<?php

namespace App\Http\Controllers;

use App\Models\LembagaNagari;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class LembagaNagariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indexs = LembagaNagari::all();
        return view('backend.lembaga_nagari.index', compact('indexs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.lembaga_nagari.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'gambarLembagaNagari' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'lembaga_nagari' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        if ($request->file('gambarLembagaNagari')) {
            $ProfiLembaga = time();

            $imageLembaga = uploadImage($request->file('gambarLembagaNagari'), 'images/lembaga_nagari/', $ProfiLembaga);
        }

        LembagaNagari::create([
            'lembaga_nagari' => $request->lembaga_nagari,
            'gambar' => $imageLembaga,
        ]);

        return response()->json(['success' => 'Lembaga Nagari Berhasil Disimpan']);
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
        $edit = LembagaNagari::where('id_lembaga_nagari', $id_edit)->first();
        return view('backend.lembaga_nagari.edit', compact('edit'));
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
        $update = LembagaNagari::where('id_lembaga_nagari', $id)->first();
        $update->lembaga_nagari = $request->lembaga_nagari;
        $update->save();

        if ($request->file('gambarLembagaNagari')) {
            $GamabarName = time();

            // Upload file dengan Helpers Laravel
            $imageLembagaNagari = uploadImage($request->file('gambarLembagaNagari'), 'images/lembaga_nagari/', $GamabarName);

            // delete gambar awal ketika di update gambar baru
            $LembagaNagari = LembagaNagari::findOrFail($id);
            File::delete(public_path() . '/images/lembaga_nagari/' . $LembagaNagari->gambar);

            // update data
            LembagaNagari::where('id_lembaga_nagari', $id)->update([
                'gambar' => $imageLembagaNagari,
            ]);
        }

        return response()->json(['success' => 'Lembaga Nagari Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = LembagaNagari::where('id_lembaga_nagari', $id)->first();
        File::delete(public_path() . '/images/lembaga_nagari/' . $delete->gambar);
        $delete->delete();
        return response()->json(['success' => 'Lembaga Nagari Berhasil Dihapus']);
    }
}
