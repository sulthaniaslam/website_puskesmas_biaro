<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\Publikasi_IKM;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class PublikasiIkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('https://rangkiang.agamkab.go.id/api/ikm/ajaxGrafikPenilaian?kode_instansi=PS-3');
        $response->json();
        $indexs = $response->json();
        // $indexs = Publikasi_IKM::all();
        return view('backend.publikasi_ikm.index', compact('indexs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.publikasi_ikm.create');
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
            'periode_tahun' => 'required',
            'periode_bulan' => 'required',
            'jumlah_responden' => 'required',
            'farmasi' => 'required',
            'gigi_dan_mulut' => 'required',
            'kia_kb_imunisasi' => 'required',
            'laboratorium' => 'required',
            'pemeriksaan_khusus' => 'required',
            'pemeriksaan_umum' => 'required',
            'pendaftaran_rekam_medis' => 'required',
            'tindakan_dan_gawat_darurat' => 'required',
            'nilai_ikm' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        Publikasi_IKM::insert([
            'periode_tahun' => $request->periode_tahun,
            'periode_bulan' => $request->periode_bulan,
            'jumlah_responden' => $request->jumlah_responden,
            'farmasi' => $request->farmasi,
            'gigi_dan_mulut' => $request->gigi_dan_mulut,
            'kia_kb_imunisasi' => $request->kia_kb_imunisasi,
            'laboratorium' => $request->laboratorium,
            'pemeriksaan_umum' => $request->pemeriksaan_umum,
            'pemeriksaan_khusus' => $request->pemeriksaan_khusus,
            'pendaftaran_rekam_medis' => $request->pendaftaran_rekam_medis,
            'tindakan_dan_gawat_darurat' => $request->tindakan_dan_gawat_darurat,
            'nilai_ikm' => $request->nilai_ikm,
        ]);

        return response()->json(['success' => 'Publikasi IKM Berhasil Disimpan']);
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
        $edit = Publikasi_IKM::where('id_publikasi_ikm', $id_edit)->first();
        return view('backend.publikasi_ikm.edit', compact('edit'));
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
        $update = Publikasi_IKM::where('id_publikasi_ikm', $id)->first();
        $update->periode_tahun = $request->periode_tahun;
        $update->periode_bulan = $request->periode_bulan;
        $update->jumlah_responden = $request->jumlah_responden;
        $update->farmasi = $request->farmasi;
        $update->gigi_dan_mulut = $request->gigi_dan_mulut;
        $update->kia_kb_imunisasi = $request->kia_kb_imunisasi;
        $update->laboratorium = $request->laboratorium;
        $update->pemeriksaan_khusus = $request->pemeriksaan_khusus;
        $update->pemeriksaan_umum = $request->pemeriksaan_umum;
        $update->pendaftaran_rekam_medis = $request->pendaftaran_rekam_medis;
        $update->tindakan_dan_gawat_darurat = $request->tindakan_dan_gawat_darurat;
        $update->nilai_ikm = $request->nilai_ikm;
        $update->save();


        return response()->json(['success' => 'Publikasi IKM Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = Publikasi_IKM::where('id_publikasi_ikm', $request->id_hapus)->first();
        $delete->delete();
        return response()->json(['success' => 'Publikasi IKM Berhasil Dihapus']);
    }
}
