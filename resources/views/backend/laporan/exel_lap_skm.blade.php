<?php
//    $filename = 'Laporan_skm';
//    header("Content-type: application/vnd-ms-excel"); 
//    header("Content-Disposition: attachment; filename=$filename.xls"); 
//    header("Pragma: no-cache"); 
//    header("Expires: 0");
?>

<link
    href="https://fonts.googleapis.com/css2?family=Playball&family=Playfair+Display&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">

<style>
    #header {
        font-family: "Roboto", sans-serif;
        /* font-family: "Lobster Two", cursive; */
    }
</style>
<div style="margin-top: 5rem" id="header">
    <?php
date_default_timezone_set('Asia/Jakarta');
?>
    <center>
        <span> <b> PENGOLAHAN DATA SURVEI KEPUASAN MASYARAKAT <br>
                PER RESPONDEN DAN PER UNSUR PELAYANAN
                <br>
                <span style="font-size:0.8rem">PADA UNIT PELAYANAN PUBLIK DI LINGKUNGAN PEMERINTAH KABUPATEN AGAM TAHUN
                    @php
                    echo date('Y')
                    @endphp</span>
            </b>
        </span>
    </center>
    <center>
        <table border="2" style="margin-top: 2rem" style="border-collapse: collapse;">
            <tr class="text-center">
                <th rowspan="2" class="text-center"> NO RESP</th>
                <th colspan="9">Umur</th>
                <th rowspan="2">Keterangan</th>
                {{-- <th colspan="5">Pendidikan</th>
                <th colspan="6">Pekerjaan</th> --}}
            </tr>
            <tr>
                <th style="width: 100px">U1</th>
                <th style="width: 100px">U2</th>
                <th style="width: 100px">U3</th>
                <th style="width: 100px">U4</th>
                <th style="width: 100px">U5</th>
                <th style="width: 100px">U6</th>
                <th style="width: 100px">U7</th>
                <th style="width: 100px">U8</th>
                <th style="width: 100px">U9</th>
            </tr>

            <tbody class="tampilan_data">
                @foreach ($data['nilai_responden'] as $key => $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item[0] }}</td>
                    <td>{{ $item[1] }}</td>
                    <td>{{ $item[2] }}</td>
                    <td>{{ $item[3] }}</td>
                    <td>{{ $item[4] }}</td>
                    <td>{{ $item[5] }}</td>
                    <td>{{ $item[6] }}</td>
                    <td>{{ $item[7] }}</td>
                    <td>{{ $item[8] }}</td>
                    <td></td>
                </tr>
                @endforeach

                <tr style="font-weight: bold;">
                    <td>NRR / Unsur</td>
                    @foreach ($data['nilai_unsur'] as $nilai_unsur)
                    <td>{{ round($nilai_unsur, 3) }}</td>
                    @endforeach
                    <td></td>
                </tr>

                <tr style="font-weight: bold;">
                    <td>NRR tertimbang / Unsur</td>
                    <?php
                    $nrr_tertimbang = 0;
                    foreach ($data['nilai_tertimbang'] as $value) {
                        $nrr_tertimbang += $value;
                    ?>
                    <td>{{ round($value, 3) }}</td>
                    <?php
                    }
                    ?>
                    <td>{{ round($nrr_tertimbang, 3) }}</td>
                </tr>

                <tr style="font-weight: bold;">
                    <td colspan="10" style="text-align: center;">Nilai IKM</td>
                    <td>{{ round(($nrr_tertimbang * 25), 3) }}</td>
                </tr>


                {{-- @foreach ($allData_exel as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ ($item['usia'] == '< 13 s/d 16 Thn') ? 'V' : '' ;}}</td>
                    <td>{{ ($item['usia'] == '17 s/d 20 Thn') ? 'V' : '' ;}}</td>
                    <td>{{ ($item['usia'] == '21 s/d 40 Thn') ? 'V' : '' ;}}</td>
                    <td>{{ ($item['usia'] == '41 s/d > 60 Thn') ? 'V' : '' ;}}</td>
                    <td>{{ ($item['jenis_kelamin'] == 'L') ? 'V' : '' ;}}</td>
                    <td>{{ ($item['jenis_kelamin'] == 'P') ? 'V' : '' ;}}</td>
                    <td>{{ ($item['pendidikan'] == 'SD') ? 'V' : '' ;}}</td>
                    <td>{{ ($item['pendidikan'] == 'SMP') ? 'V' : '' ;}}</td>
                    <td>{{ ($item['pendidikan'] == 'SMA') ? 'V' : '' ;}}</td>
                    <td>{{ ($item['pendidikan'] == 'S1') ? 'V' : '' ;}}</td>
                    <td>{{ ($item['pendidikan'] == 'S2' || $item['pendidikan'] == 'S3') ? 'V' : ''
                        }}</td>
                    <td>{{ ($item['pekerjaan'] == 'PNS') ? 'V' : '' ;}}</td>
                    <td>{{ ($item['pekerjaan'] == 'TNI') ? 'V' : '' ;}}</td>
                    <td>{{ ($item['pekerjaan'] == 'POLRI') ? 'V' : '' ;}}</td>
                    <td>{{ ($item['pekerjaan'] == 'SWASTA') ? 'V' : '' ;}}</td>
                    <td>{{ ($item['pekerjaan'] == 'WIRAUSAHA') ? 'V' : '' ;}}</td>
                    <td>{{ ($item['pekerjaan'] == 'LAINNYA') ? 'V' : '' ;}}</td>
                </tr>
                @endforeach --}}
            </tbody>
        </table>
    </center>
</div>