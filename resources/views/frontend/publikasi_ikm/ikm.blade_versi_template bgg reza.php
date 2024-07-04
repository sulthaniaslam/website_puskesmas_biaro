@extends('layouts.detail_tampilan')
<title>Publikasi IKM Puskesmas Matur</title>
@section('title_user_detail', 'Publikasi IKM Puskesmas Matur')

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="msapplication-TileImage" content="Publikasi IKM Puskesmas Matur ">

<meta property="og:site_name" content="https://puskesmaslasi.agamkab.go.id/">
<meta property="og:title" content="Publikasi IKM Puskesmas Matur">
<meta property="og:description" content="Publikasi IKM Dari Website Resmi Pukesmas Nagari Matur Kabupaten Agam">

<!-- Meta tag untuk penulis -->
<meta name="author" content="Yoga Tri Wahyudi S.Kom">

<!-- Meta tag untuk nama situs di Google -->
<meta itemprop="name" content="Nama Situs Anda">
<meta itemprop="description" content="
Website Puskesmas yang dikembangkan oleh software engineer YOGA TRI WAHYUDI, S.Kom dari Diskominfo Agam, menawarkan solusi digital yang inovatif untuk pelayanan kesehatan masyarakat.">

<!-- Site Name, Title, and Description to be displayed -->
<meta property="og:site_name" content="https://puskesmaslasi.agamkab.go.id/">

<!-- Image to display -->
<!-- Replace   «example.com/image01.jpg» with your own -->
<meta property="og:image" content="https://puskesmaslasi.agamkab.go.id/public/images/logo_head.jpeg">

<!-- No need to change anything here -->
<meta property="og:type" content="https://puskesmaslasi.agamkab.go.id/" />
<meta property="og:image:type" content="https://puskesmaslasi.agamkab.go.id/public/images/logo_head.jpeg">

<!-- Size of image. Any size up to 300. Anything above 300px will not work in WhatsApp -->
<meta property="og:image:width" content="300">
<meta property="og:image:height" content="300">

<!-- Website to visit when clicked in fb or WhatsApp-->
<meta property="og:url" content="https://puskesmaslasi.agamkab.go.id/">
<link itemprop="thumbnailUrl" href="https://puskesmaslasi.agamkab.go.id/public/images/logo_head.jpeg">

@section('content_detail')

<style>
    /* Efek hover saat tidak dicentang dan diklik */
    .form-check-label:not(.active):hover {
        background-color: #eee;
        color: #000;
    }

    /* Efek hover saat dicentang */
    .form-check-input:checked~.form-check-label:hover {
        background-color: #BEADFA;
        color: #fff;
    }

    .form-check-label.active {
        background-color: #BEADFA;
        color: #fff;
    }

    .form-check-label.active::before {
        content: none;
    }

    .form-check-label.active:hover::before {
        font-family: 'Font Awesome\ 6 Free';
        margin-right: 8px;
    }

    /* Tambahan styling lainnya, jika diperlukan */
    .form-check {
        display: flex;
        align-items: center;
    }

    .form-check-input {
        display: none;
    }

    .form-check-label {
        cursor: pointer;
        display: flex;
        align-items: center;
        flex-direction: column;
        /* Posisikan emoticon di atas radio button */
        text-align: center;
        /* Atur teks menjadi tengah */
        font-size: 4rem;
    }

    .form-check-input:checked+.form-check-label::before {
        content: "\f14a";
        font-family: 'Font Awesome\ 6 Free';
        margin-bottom: 8px;
        /* Sesuaikan margin-bottom sesuai kebutuhan Anda */
    }

    .form-check {
        display: inline-block;
    }

    .card {
        justify-content: center;
    }

    .question-container {
        margin-bottom: 20px;
        /* Sesuaikan dengan kebutuhan desain Anda */
    }



    @media (min-width: 992px) and (max-width: 1199.98px) {

        #form_emoticon {
            padding-left: 10rem;

        }
    }

    @media (min-width: 768px) and (max-width: 991.98px) {

        #buttonSubmitCancel {
            margin-top: 2rem;
        }

    }


    @media (max-width: 768px) {
        .card {
            width: 100%;
        }

        .form-check-label {
            font-size: 1.5rem;
            /* Sesuaikan dengan ukuran yang diinginkan */
            /* Tambahan gaya styling lainnya, jika diperlukan */
            align-items: center;
        }

        .text_label {
            font-size: 1rem;
        }

        .font-weight-bold {
            font-size: 18px;
        }

        .card-text {
            font-size: 14px;
        }

        .img-fluid {
            width: 15%;
        }

        .ml-2.mx-4.text-center {
            padding: 10px;
        }

        #btnInsert {
            justify-content: center;
            /* align-items: center; */
        }

        #form_emoticon {
            justify-content: center;
            /* align-items: center; */

        }

        #buttonSubmitCancel {
            margin-top: 2rem;
        }

    }

    .d-flex.align-items-center.justify-content-center {
        flex-wrap: wrap;
    }
</style>

<section class="skm">
    <div class="container body-skm">
        <div class="row text-center">
            <div class="col-3">
                <img src="{{asset('assets/img/logo-agam.png')}}" height="80" alt="logo" class="mb-3">
            </div>
            <div class="col-6">
                <h3><strong>UPTD PUSKESMAS MATUR</strong></h3>
                <p>Jln. Kari Musa Pasar Matur Hilir, Kecamatan Matur, Kabupaten Agam</p>
            </div>
            <div class="col-3">
                <img src="{{asset('assets/img/puskesmas.svg')}}" height="80" alt="logo" class="mb-3">
            </div>
        </div>
        <hr>
        @php
        $no = 0;
        @endphp
        <form class="container-fluid" method="POST" id="form_emoticon">

            <div class="row">
                <div class="col-6">
                    <label for="">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" aria-label="Default select example" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    <div id="validationJenisKelamin" class="invalid-feedback"></div>

                    <label for="" class="mt-3">Pekerjaan</label>
                    <select class="form-control" aria-label="Default select example" name="pekerjaan" id="pekerjaan" required>
                        <option value="">Pilih Pekerjaan</option>
                        <option value="PNS">PNS</option>
                        <option value="TNI">TNI</option>
                        <option value="POLRI">POLRI</option>
                        <option value="SWASTA">SWASTA</option>
                        <option value="WIRAUSAHA">WIRAUSAHA</option>
                        <option value="LAINNYA">LAINNYA</option>
                    </select>
                    <div id="validationPekerjaan" class="invalid-feedback"></div>

                </div>

                <div class="col-6">

                    <label for="">Pendidikan</label>
                    <select class="form-control" aria-label="Default select example" name="pendidikan" id="pendidikan" required>
                        <option value="">Pilih Pendidikan</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                    <div id="validationPendidikan" class="invalid-feedback"></div>

                    <label for="" class="mt-3">Range Umur </label>
                    <select class="form-control" aria-label="Default select example" name="umur" id="umur" required>
                        <option value="">Pilih Range Umur</option>
                        <option value="< 13 s/d 16 Thn">
                            < 13 s/d 16 Thn </option>
                        <option value="17 s/d 20 Thn"> 17 s/d 20 Thn
                        </option>
                        <option value="21 s/d 40 Thn"> 21 s/d 40 Thn
                        </option>
                        <option value="41 s/d > 60 Thn"> 41 s/d > 60 Thn
                        </option>
                    </select>
                    <div id="validationRangeUmur" class="invalid-feedback"></div>

                </div>

                <div class="col-12">

                    <label for="" class="mt-4">Pilih Ruangan </label>
                    <select class="form-control" aria-label="Default select example" name="ruangan" id="ruangan" required>
                        <option value="">Pilih Ruangan</option>
                        <option value="Ruangan Pendaftaran dan Rekammedis">Ruangan Pendaftaran dan
                            Rekammedis</option>
                        <option value="Ruangan Pemeriksaan Umum">Ruangan Pemeriksaan Umum</option>
                        <option value="Ruang Tindakan dan Gawat Darurat">Ruang Tindakan dan Gawat
                            Darurat</option>
                        <option value="Ruang KIA, KB dan Imunisasi">Ruang KIA, KB dan Imunisasi</option>
                        <option value="Ruang Kesehatan Gigi dan Mulut">Ruang Kesehatan Gigi dan Mulut
                        </option>
                        <option value="Ruang Komunikasi dan Edukasi (KIE)">Ruang Komunikasi dan Edukasi
                            (KIE)</option>
                        <option value="Ruang Farmasi">Ruang Farmasi</option>
                        <option value="Ruang Laboratorium">Ruang Laboratorium</option>
                    </select>
                    <div id="validationPilihRuangan" class="invalid-feedback"></div>
                </div>
            </div>


            @csrf
            @foreach ($datas as $data)
            <p class="text_label" style="margin-top: 2rem">
                <input type="text" style="font-size: 1.2rem" class="form-control" name="kuisioner_kepuasan[]" value="{{$data['pertanyaan']}}" readonly>
            </p>
            @foreach ($data['pilihan'] as $item)
            <div class="form-check-inline">

                <label class="form-check-label">
                    {{$item['icon']}} <br>
                    <span style="font-size: 1rem;">{{$item['pilihan']}}</span>


                    <input type="radio" class="form-check input" value="{{$item['pilihan_nilai']}}" name="respon_kepuasan[<?php echo $no; ?>]" id="pilihan<?php echo $no; ?>">

                </label>

            </div>


            @endforeach

            @php
            $no++;
            @endphp
            @endforeach

            <div class="form-group row" id="buttonSubmitCancel">
                <div class="col-sm text-right">
                    <a href="{{route('/')}}" class="btn btn-danger btn-sm mb-2 mb-sm-0"><i class="fa fa-arrow-left mr-2"></i>Kembali</a>
                    <button type="button" id="submitBtn" class="btn btn-primary btn-sm mb-2 mb-sm-0 mx-2"><i class="fa fa-paper-plane mr-2"></i>Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>


@endsection