<?php
   $filename = 'SKM';
   header("Content-type: application/vnd-ms-excel"); 
   header("Content-Disposition: attachment; filename=$filename.xls"); 
   header("Pragma: no-cache"); 
   header("Expires: 0");
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
    <center>
        <span> <b> REKAP PERHITUNGAN DATA DIRI RESPONDEN SURVEI KEPUASAN MASYARAKAT <br>
                PADA UNIT PELAYANAN PUBLIK DI LINGKUNGAN PEMERINTAH KABUPATEN AGAM TAHUN
            </b>
        </span>
    </center>
    <table border="2" style="margin-top: 2rem">
        <tr class="text-center">
            <th rowspan="2" class="text-center"> NO RESP</th>
            <th colspan="4">Umur</th>
            <th colspan="2">Jenis Kelamin</th>
            <th colspan="5">Pendidikan</th>
            <th colspan="6">Pekerjaan</th>
        </tr>
        <tr>
            <th style="width: 100px">
                < 13 s/d 16 Thn</th>
            <th style="width: 100px">17 s/d 20 Thn</th>
            <th style="width: 100px">21 s/d 40 Thn</th>
            <th style="width: 100px">41 s/d > 60 Thn</th>
            <th style="width: 100px">Laki-Laki</th>
            <th style="width: 100px">Wanita</th>
            <th style="width: 100px">SD</th>
            <th style="width: 100px">SMP</th>
            <th style="width: 100px">SMA</th>
            <th style="width: 100px">S1 / D4</th>
            <th style="width: 100px">S2 / S3</th>
            <th style="width: 100px">PNS</th>
            <th style="width: 100px">TNI</th>
            <th style="width: 100px">POLRI</th>
            <th style="width: 100px">SWASTA</th>
            <th style="width: 100px">WIRAUSAHA</th>
            <th style="width: 100px">LAINNYA</th>
        </tr>

        <tbody class="tampilan_data">
            @foreach ($allData_exel as $item)
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
            @endforeach
        </tbody>
    </table>
</div>