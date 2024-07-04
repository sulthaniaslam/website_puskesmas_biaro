<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Publikasi_IKM;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserPublikasiIkmController extends Controller
{
    public function UserPublikasi_IKM()
    {
        // $indexs = Publikasi_IKM::all();
        // $publikasi_ikms = Publikasi_IKM::orderBy('id_publikasi_ikm', 'desc')->limit(1)->get();

        $response = Http::get('https://rangkiang.agamkab.go.id/api/ikm/ajaxGetSurvei');
        $datas = $response->json();
        // dd($datas);
        return view('frontend.publikasi_ikm.ikm', compact('datas'));
        // return view('frontend.publikasi_ikm.ikm');
    }

    public function CariPublikasi_IKM(Request $request)
    {
        $indexs = Publikasi_IKM::all();
        $publikasi_ikms = Publikasi_IKM::where('id_publikasi_ikm', $request->id_publikasi_ikm)->limit(1)->get();
        return view('frontend.publikasi_ikm.ikm', compact('publikasi_ikms', 'indexs'));
    }

    public function ajax_ikm(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'umur' => 'required',
            'ruangan' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->getMessageBag()->toArray()]);
        }

        if ($request->respon_kepuasan == Null) {
            return response()->json([
                'error'   => true,
                'message' => 'Data survei kosong, silahkan periksa form isian kembali'
            ]);
        }

        if (count($request->respon_kepuasan) < 9) {
            return response()->json([
                'error'   => true,
                'message' => 'Data survei kurang, silahkan periksa form isian kembali'
            ]);
        } else if (count($request->respon_kepuasan) > 9) {
            return response()->json([
                'message' => 'Data survei berlebih, silahkan periksa form isian kembali'
            ]);
        }


        $respon_kepuasan = $request->respon_kepuasan;
        $pekerjaan =  $request->pekerjaan;
        $pendidikan =  $request->pendidikan;
        $umur =  $request->umur;
        $ruangan =  $request->ruangan;
        $jenis_kelamin =  $request->jenis_kelamin;



        $curl = curl_init();
        // Konversi array ke format string
        $postData = http_build_query(array('username' => 'puskesmas_matur', 'nilai' => $respon_kepuasan, 'usia' => $umur, 'kode_instansi' => 'PS-3', 'jenis_kelamin' => $jenis_kelamin, 'pendidikan' => $pendidikan, 'pekerjaan' => $pekerjaan, 'ruangan' => $ruangan));


        curl_setopt_array($curl, array(
            // CURLOPT_URL => 'https://rangkiang.agamkab.go.id/api/ikm/ajaxInsertPenilaian',
            CURLOPT_URL => 'https://rangkiang.agamkab.go.id/api/penilaian_ikm/ajaxInsertPenilaianDev',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $postData,
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}
