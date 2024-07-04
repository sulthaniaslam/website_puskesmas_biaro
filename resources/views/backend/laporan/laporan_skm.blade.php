@extends('layouts.admin')
@section('title_admin', 'Laporan SKM')

@section('content_admin')

<link
    href="https://fonts.googleapis.com/css2?family=Playball&family=Playfair+Display&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
<style>
    #laporan {
        font-family: "Roboto", sans-serif;
        /* font-family: "Lobster Two", cursive; */
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline" id="card-mobile" style="
        width: 100%;
        /* align: center; */
        border-radius: 30px;
        background-color: #fff;
        box-shadow: 0px 0px 50px 0px #ccc;
        padding: 10px;">
            <div class="card-body">
                <div class="container">

                    <center>
                        <span id="laporan"> <b> REKAP PERHITUNGAN DATA DIRI RESPONDEN SURVEI KEPUASAN MASYARAKAT
                                <br>
                                PADA UNIT PELAYANAN PUBLIK DI LINGKUNGAN PEMERINTAH KABUPATEN AGAM
                            </b>
                        </span>
                    </center>

                    <a href="{{route('export_exel')}}" class="btn btn-primary my-3">Export Exel</a>
                    <a href="{{route('export_exel_hasil')}}" class="btn btn-success my-3">Export Hasil SKM</a>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th rowspan="2" class="text-center"> NO RESEP</th>
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
                            </thead>
                            <tbody class="tampilan_data">
                                @foreach ($allData as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ ($item['usia'] == '< 13 s/d 16 Thn') ? '✔' : '' ;}}</td>
                                    <td>{{ ($item['usia'] == '17 s/d 20 Thn') ? '✔' : '' ;}}</td>
                                    <td>{{ ($item['usia'] == '21 s/d 40 Thn') ? '✔' : '' ;}}</td>
                                    <td>{{ ($item['usia'] == '41 s/d > 60 Thn') ? '✔' : '' ;}}</td>
                                    <td>{{ ($item['jenis_kelamin'] == 'L') ? '✔' : '' ;}}</td>
                                    <td>{{ ($item['jenis_kelamin'] == 'P') ? '✔' : '' ;}}</td>
                                    <td>{{ ($item['pendidikan'] == 'SD') ? '✔' : '' ;}}</td>
                                    <td>{{ ($item['pendidikan'] == 'SMP') ? '✔' : '' ;}}</td>
                                    <td>{{ ($item['pendidikan'] == 'SMA') ? '✔' : '' ;}}</td>
                                    <td>{{ ($item['pendidikan'] == 'S1') ? '✔' : '' ;}}</td>
                                    <td>{{ ($item['pendidikan'] == 'S2' || $item['pendidikan'] == 'S3') ? '✔' : ''
                                        }}</td>
                                    <td>{{ ($item['pekerjaan'] == 'PNS') ? '✔' : '' ;}}</td>
                                    <td>{{ ($item['pekerjaan'] == 'TNI') ? '✔' : '' ;}}</td>
                                    <td>{{ ($item['pekerjaan'] == 'POLRI') ? '✔' : '' ;}}</td>
                                    <td>{{ ($item['pekerjaan'] == 'SWASTA') ? '✔' : '' ;}}</td>
                                    <td>{{ ($item['pekerjaan'] == 'WIRAUSAHA') ? '✔' : '' ;}}</td>
                                    <td>{{ ($item['pekerjaan'] == 'LAINNYA') ? '✔' : '' ;}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection

@push('script')
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

@endpush