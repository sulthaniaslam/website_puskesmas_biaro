@extends('layouts.admin')
@section('title_admin', 'Hasil IKM')

@section('content_admin')

<link
    href="https://fonts.googleapis.com/css2?family=Playball&family=Playfair+Display&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
<style>
    #laporan {
        font-family: "Roboto", sans-serif;
        /* font-family: "Lobster Two", cursive; */
    }

    .highcharts-figure,

    #containerActualType1 {
        /* height: 400px; */
        width: 100%;
    }
</style>

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
                    <div class="card mb-3" id="laporan">
                        <div class="card-header bg-light text-center" style="font-size:1.3rem; font-weight: bold;">
                            Indeks Kepuasan
                            Masyarakat
                            (IKM) <br>
                            Puskesmas Lasi Kec. Candung <br>
                            Kabupaten Agam</div>
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-4" style="font-size: 2rem; margin-top:10rem">
                                    NILAI IKM
                                    <div class="col-6" style="font-size: 3.5rem; margin:auto; color: #C499F3">
                                        {{$index_hasil_ikm['hasil']}}
                                    </div>
                                </div>
                                <div class="col-8">
                                    <b style="font-size: 2rem"> Responden </b> <br>
                                    <b> Jumlah : {{$jumlah_responden}} Orang </b> <br>

                                    <div style="display: flex;" class="mt-4">
                                        <div style="flex: 1;">
                                            @foreach ($j_kelamin as $jk => $jml_jk)
                                            @if ($jk === 'L')
                                            <b>LAKI-LAKI: {{ $jml_jk }} Orang</b><br>
                                            @endif
                                            @endforeach
                                        </div>
                                        <div style="flex: 1;">
                                            @foreach ($j_kelamin as $jk => $jml_jk)
                                            @if ($jk === 'P')
                                            <b>PEREMPUAN: {{ $jml_jk }} Orang</b><br>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row mt-2">

                                        <div class="col-6"><b> PENDIDIKAN </b>
                                            <div class="col-12" style="margin-left: 5rem; text-align:left;">
                                                <ul>
                                                    @foreach ($jumlah_pendidikan as $pendidikan => $jumlah)
                                                    <li>{{ $pendidikan }} : {{ $jumlah }} orang</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-6"><b> PEKERJAAN </b>

                                            <div class="col-12" style="text-align:left;">
                                                <ul>
                                                    @foreach ($array_pekerjaan as $pekerjaan => $jml_pekerjaan)
                                                    <li>{{$pekerjaan}} : {{$jml_pekerjaan}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row mt-2">

                                        <div class="col-6"><b> Range Umur </b>

                                            <div class="col-12"
                                                style="text-align:left; margin-left:5rem; margin-top:0.5rem">
                                                <ul>
                                                    @foreach ($array_usia as $usia => $jml_usia)
                                                    <li>{{$usia}} : {{$jml_usia}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                        </div>

                                        <div class="col-6"><b> Ruangan Puskesmas </b>
                                            <div class="col-12" style="text-align:left;">
                                                <ul>
                                                    @foreach ($array_ruangan as $ruangan => $ruangan_jumlah)
                                                    <li>{{ $ruangan }} : {{ $ruangan_jumlah }} orang</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>



                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12" style="margin-top: 5rem">
                            <figure class="highcharts-figure">
                                <div id="containerActualType1"></div>
                                <p class="highcharts-description">
                                </p>
                            </figure>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>
@endsection

@push('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

<script>
    $(document).ready(function() {
            $.ajax({
                url: "https://rangkiang.agamkab.go.id/api/ikm/ajaxCountSurveyor?kode_instansi=PS-1",
                type: "GET",
                dataType: "JSON",
                success: function(response) {
                    console.log(response);
                    console.log(response.jenis_kelamin);
                }
            });
        });

        $.ajax({
            type: "GET",
            url: "https://rangkiang.agamkab.go.id/api/ikm/ajaxGrafikPenilaian",
            data: {
                kode_instansi: 'PS-1',
            },
            success: function(response) {
                // var data = JSON.parse(response)
                console.log(response);
                var nilai = response.nilai_unsur;
                console.log(nilai[0]);

                Highcharts.chart('containerActualType1', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Grafik Survey Kepuasan Masyarakat'
                    },
                    subtitle: {
                        // text: 'Source: <a href="https://worldpopulationreview.com/world-cities" target="_blank">World Population Review</a>'
                    },
                    xAxis: {
                        type: 'category',
                        labels: {
                            autoRotation: [-45, -90],
                            style: {
                                fontSize: '13px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Puskesmas Lasi'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    tooltip: {
                        pointFormat: 'Hasil Responden: <b>{point.y:.1f}</b>'
                    },
                    series: [{
                        name: 'Population',
                        colors: [
                            '#9b20d9', '#9215ac', '#861ec9', '#7a17e6', '#7010f9',
                            '#691af3',
                            '#6225ed', '#5b30e7', '#533be1', '#4c46db', '#4551d5',
                            '#3e5ccf',
                            '#3667c9', '#2f72c3', '#277dbd', '#1f88b7', '#1693b1',
                            '#0a9eaa',
                            '#03c69b', '#00f194'
                        ],
                        colorByPoint: true,
                        groupPadding: 0,
                        data: [
                            ['Persyaratan Pelayanan', nilai[0]],
                            ['Prosedur Pelayanan', nilai[1]],
                            ['Kecepatan Pelayanan', nilai[2]],
                            ['Biaya Pelayanan', nilai[3]],
                            ['Produk Pelayanan', nilai[4]],
                            ['Kemampuan Petugas Pelayanan', nilai[5]],
                            ['Perilaku Petugas Pelayanan', nilai[6]],
                            ['Kualitas Sarana dan Prasarana Pelayanan', nilai[7]],
                            ['Penanganan Pengaduan Pelayanan', nilai[8]],
                        ],
                        dataLabels: {
                            enabled: true,
                            rotation: -90,
                            color: '#FFFFFF',
                            align: 'right',
                            format: '{point.y:.1f}', // one decimal
                            y: 10, // 10 pixels down from the top
                            style: {
                                fontSize: '13px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    }]
                });

            }
        });
</script>
@endpush