<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\MekanismeAlur;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;

class MekanismeAlurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indexs = MekanismeAlur::all();
        return view('backend.mekanisme_alur.index', compact('indexs'));
    }

    public function edit($id)
    {
        $id_edit = Crypt::decrypt($id);
        $edit = MekanismeAlur::where('id_mekanisme_alur', $id_edit)->first();
        return view('backend.mekanisme_alur.edit', compact('edit'));
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
        if ($request->file('gambarMekanismeAlur')) {
            $update_time = time();

            // delete gambar awal ketika di update gambar baru
            $gambar_file = MekanismeAlur::findOrFail($id);
            File::delete(public_path() . '/images/mekanisme_alur/' . $gambar_file->gambar_alur);

            $updateMekanisme = uploadImage($request->file('gambarMekanismeAlur'), 'images/mekanisme_alur/', $update_time);

            MekanismeAlur::where('id_mekanisme_alur', $id)->update([
                'gambar_alur' => $updateMekanisme,
            ]);
        }

        return response()->json(['success' => 'Mekanisme Alur Publik Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
