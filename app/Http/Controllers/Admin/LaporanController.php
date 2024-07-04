<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SkmExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function laporan_ikm()
    {

        $hasil_ikm = Http::get('https://rangkiang.agamkab.go.id/api/ikm/ajaxGrafikPenilaian?kode_instansi=PS-3');
        $hasil_ikm->json();
        $index_hasil_ikm = $hasil_ikm->json();
        
        
        $response = Http::get('https://rangkiang.agamkab.go.id/api/ikm/ajaxCountSurveyor?kode_instansi=PS-3');
        $response->json();
        $datas = $response->json();
        
        // dd($datas);

        $jenis_ruangan = $datas['ruangan'];
        $jenis_kelamin = $datas['jenis_kelamin'];
        $pendidikan = $datas['pendidikan'];
        $jenis_pekerjaan = $datas['pekerjaan'];
        $jenis_usia = $datas['usia'];

        // ----- pendidikan ---------
        // Inisialisasi array untuk menyimpan jumlah pendidikan
        $jumlah_pendidikan = [
            'SD' => 0,
            'SMP' => 0,
            'SMA' => 0,
            'D1' => 0,
            'D2' => 0,
            'D3' => 0,
            'D4' => 0,
            'S1' => 0,
            'S2' => 0,
            'S3' => 0,
        ];

        // Menghitung jumlah pendidikan
        foreach ($pendidikan as $q) {
            // Menambahkan jumlah pendidikan sesuai dengan jenis pendidikan
            $jumlah_pendidikan[$q['pendidikan']] += $q['jumlah'];
        }

        // ----- !pendidikan! ---------

        // ----- jenis kelamin ---------

        $j_kelamin = [
            'L' => 0,
            'P' => 0,
        ];

        $jumlah_responden = 0;
        foreach ($jenis_kelamin as $hasil_foreach) {
            $j_kelamin[$hasil_foreach['jenis_kelamin']] += $hasil_foreach['jumlah'];
            $jumlah_responden += $hasil_foreach['jumlah'];
        }

        // ----- !jenis kelamin! ---------

        // ----- Pekerjaan ---------

        $array_pekerjaan = [
            'PNS' => 0,
            'TNI' => 0,
            'PPK' => 0,
            'POLRI' => 0,
            'SWASTA' => 0,
            'WIRAUSAHA' => 0,
            'LAINNYA' => 0,
        ];

        foreach ($jenis_pekerjaan as $foreach_pekerjaan) {
            $array_pekerjaan[$foreach_pekerjaan['pekerjaan']] += $foreach_pekerjaan['jumlah'];
        }

        // ----- Range Umur ---------

        // $array_usia = [
        //     '< 13 s/d 16 Thn' => 0,
        //     '17 s/d 20 Thn' => 0,
        //     '21 s/d 40 Thn' => 0,
        //     '41 s/d > 60 Thn' => 0,
        // ];

        $array_usia = [];
        foreach ($jenis_usia as $k_u => $usia) {
            $array_usia[$usia['usia']] = 0;
        }

        // dd($array_usia);

        foreach ($jenis_usia as $foreach_umur) {
            $array_usia[$foreach_umur['usia']] += $foreach_umur['jumlah'];
        }

        // ----- !Range Umur! ---------


        // ----- Ruangan ---------

        $array_ruangan = [
            'Ruangan Pendaftaran dan Rekammedis' => 0,
            'Ruangan Pemeriksaan Umum' => 0,
            'Ruang Tindakan dan Gawat Darurat' => 0,
            'Ruang KIA, KB dan Imunisasi' => 0,
            'Ruang Kesehatan Gigi dan Mulut' => 0,
            'Ruang Komunikasi dan Edukasi (KIE)' => 0,
            'Ruang Farmasi' => 0,
            'Ruang Laboratorium' => 0,
        ];

        foreach ($jenis_ruangan as $foreach_ruangan) {
            $array_ruangan[$foreach_ruangan['ruangan']] += $foreach_ruangan['jumlah'];
        }

        // ----- !Ruangan! ---------

        return view('backend.laporan.laporan_ikm', compact('jenis_kelamin', 'jumlah_pendidikan', 'j_kelamin', 'array_pekerjaan', 'index_hasil_ikm', 'jumlah_responden', 'array_ruangan', 'array_usia'));
    }

    public function laporan_skm()
    {

        $response = Http::get('https://rangkiang.agamkab.go.id/api/ikm/ajaxCountSurveyor?kode_instansi=PS-3');
        $response->json();
        $Data = $response->json();
        $allData = $Data['allData'];
        return view('backend.laporan.laporan_skm', compact('allData'));
    }

    public function export_exel()
    {
        // $statusFU = ['Contacted', 'Rejected', 'Unreachable', 'Failed'];
        // $tgl = ['2022-03-07 (Benar)', '2022/03/07 (Salah)', '', ''];
        // $media = ['WA', 'TELFON', '', ''];
        // $total = ['100000 (Benar)', '100.000 (Salah)', 'Rp. 100.000 (Salah)', ''];

        // foreach ($statusFU as $key => $value) {

        //     $datas[] = [
        //         $value,
        //         $tgl[$key],
        //         $media[$key],
        //         $total[$key]
        //     ];
        // }

        // $export2 = new SkmExport([$datas]);
        // return Excel::download($export2, 'CustlistMster.xlsx');

        // return Excel::download(new SkmExport, "skm.xlsx");

        $response_exel = Http::get('https://rangkiang.agamkab.go.id/api/ikm/ajaxCountSurveyor?kode_instansi=PS-3');
        $response_exel->json();
        $Data = $response_exel->json();
        $allData_exel = $Data['allData'];

        return view('backend.laporan.exel', compact('allData_exel'));
    }

    public function export_exel_skm()
    {
        // https: //rangkiang.agamkab.go.id/api/ikm/ajaxDataIKM?kode_instansi=13622002
        $response_exel_skm = Http::get('https://rangkiang.agamkab.go.id/api/ikm/ajaxDataIKM?kode_instansi=PS-3');
        $response_exel_skm->json();
        $Data = $response_exel_skm->json();
        // dd($Data);

        // return view('backend.laporan.exel_lap_skm', compact('allData_exel'));
        return view('backend.laporan.exel_lap_skm', ['data' => $Data]);
    }
}






// $pekerjaan = $indexs['pekerjaan'];
// dd($pekerjaan);

// dd($jenis_kelamin);

// foreach ($indexs['jenis_kelamin'] as $jenis_kelamin_foreach) {
//     $jenis_kelamin_result = $jenis_kelamin_foreach;
// }
