@extends('layouts.user')
@section('title', 'Website Puskesmas Biaro')

@section('content_user')

<!-- Tombol back to top -->
<button onclick="topFunction()" id="tombolatas" title="Go to top"><i class="fa fa-solid fa-arrow-up"></i></button>
<a type="button"
    href="https://api.whatsapp.com/send?phone=<?php echo '62' . '082170907964' ?>&text= Assalamu'alaikum bapak/ibuk "
    id="tombolwa" title="Tombol Chat WA" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
<!-- tutup tombol back to top -->
<style>
    .bg-utama {
        height: 100vh;
        background-image: url('{{ asset("images/gambar_profile/puskesmas_biaro.jpg") }}');
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
    }
</style>
<section class="sesi1" id="sesi1">
    <div class="bg-utama col-12">
        <div class="img1">
            <h3 class="subjudul">Selamat Datang di Website Resmi</h3>
            <h1 class="judul">PUSKESMAS BIARO</h1>
            <a type="button" href="#profil" class="tombol-sesi1">Mulai Jelajah</a>
        </div>
    </div>
</section>
{{-- data profil puskesmas --}}
<section class="sesi2 pb-3 pt-3" id="profil">
    <div class="container bg-sesi2">
        <div class="row">
            <div class="col-12 text-center">
                <p class="judul-sesi"><i class="fa fa-hospital-o" aria-hidden="true"></i> Profil Puskesmas</p>
                <div class="judul-bar"></div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 p-3">
                {{-- <a type="button" data-bs-toggle="modal" data-bs-target="#ModalProfil"> --}}
                    <a onclick="sejarah()">
                        <div class="card l-bg-orange-dark pilih-sesi2">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fa fa-medkit" aria-hidden="true"></i>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 nama-tombol-sesi2">
                                            Profil Puskesmas
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 p-3">
                {{-- <a type="button" data-bs-toggle="modal" data-bs-target="#ModalVisiMisi"> --}}
                    <a onclick="visiMisi()">
                        <div class="card l-bg-orange-dark pilih-sesi2">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fa fa-plus-square"
                                        aria-hidden="true"></i>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-12">
                                        <h2 class="d-flex align-items-center mb-0 nama-tombol-sesi2"> Visi Misi
                                            Puskesmas
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 p-3">
                {{-- <a type="button" data-bs-toggle="modal" data-bs-target="#ModalStrukturOrganisasi"> --}}
                    <a onclick="strukturOrganisasi()">
                        <div class="card l-bg-orange-dark pilih-sesi2">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fa fa-sitemap" aria-hidden="true"></i>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 nama-tombol-sesi2">
                                            Struktur Organisasi
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 p-3">
                {{-- <a type="button" data-bs-toggle="modal" data-bs-target="#ModalPegawai"> --}}
                    <a onclick="Pegawai()">
                        <div class="card l-bg-orange-dark pilih-sesi2">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fa fa-user-md" aria-hidden="true"></i>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 nama-tombol-sesi2">
                                            Pegawai Puskesmas
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
            </div>
        </div>
    </div>
</section>
{{-- data profil puskesmas --}}

{{-- data jadwal dan tarif --}}
<section class="sesi6" id="jadwaltarif">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="judul-sesi6"><i class="fa fa-handshake-o" aria-hidden="true"></i> Jadwal dan Tarif</p>
                <div class="judul-bar3"></div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center mb-5">
                <div
                    class="swiffy-slider slider-indicators-dark slider-indicators-outside slider-indicators-round slider-indicators-highlight">
                    <ul class="slider-container">
                        @foreach ($jadwalPelayanan as $key => $jadwal)
                        <li>
                            <img src='{{ asset("images/jadwal_pelayanan/$jadwal->gambar_jadwal") }}'
                                alt="gambar {{ $key + 1 }}" class="gambar-sesi6">
                        </li>
                        @endforeach
                    </ul>

                    <button type="button" class="slider-nav"></button>
                    <button type="button" class="slider-nav slider-nav-next"></button>

                    <div class="slider-indicators">
                        @foreach ($jadwalPelayanan as $key => $jadwal)
                        <button class="{{ $key === 0 ? 'active' : '' }}"></button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center mb-5">
                <div
                    class="swiffy-slider slider-indicators-dark slider-indicators-outside slider-indicators-round slider-indicators-highlight">
                    <ul class="slider-container">
                        @foreach ($tarifPelayanan as $key => $tarif)
                        <li>
                            <img src='{{ asset("images/tarif_pelayanan/$tarif->gambar_tarif") }}'
                                alt="gambar {{ $key + 1 }}" class="gambar-sesi6">
                        </li>
                        @endforeach
                    </ul>

                    <button type="button" class="slider-nav"></button>
                    <button type="button" class="slider-nav slider-nav-next"></button>

                    <div class="slider-indicators">
                        @foreach ($tarifPelayanan as $key => $tarif)
                        <button class="{{ $key === 0 ? 'active' : '' }}"></button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- data profil puskesmas --}}

{{-- data pelayanan publik --}}
<section class="sesi3 pt-3 pb-3" id="layanan">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="judul-sesi3"><i class="fa fa-handshake-o" aria-hidden="true"></i> Layanan Publik</p>
                <div class="judul-bar3"></div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-5 text-center">
                <img src='{{ asset("images/berkas_layanan_publik/$allBerkas->gambar_berkas")
                }}' alt="gamabr maklumat" class="gambar-sesi3">
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 pb-5">
                <div class="row">
                    <p class="teks-sesi3">{!!$allBerkas->keterangan_berkas!!}</p>
                    <div class="col-6">
                        <a onclick="standard_pelayanan()">
                            <div class="card card-sesi3">
                                <img src="{{asset('assets/img/contoh9.png')}}" class="card-img-top gambar-card-sesi3"
                                    alt="...">
                                <div class="card-body">
                                    <p class="card-text judul-card-sesi3">Standard Pelayanan</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a onclick="jenis_pelayanan()">
                            <div class="card card-sesi3">
                                <img src="{{asset('assets/img/contoh10.png')}}" class="card-img-top gambar-card-sesi3"
                                    alt="...">
                                <div class="card-body">
                                    <p class="card-text judul-card-sesi3">Jenis-jenis Pelayanan</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="https://sippn.menpan.go.id/" target="_blank" style="color: white">
                            <div class="card card-sesi3">
                                <img src="{{asset('assets/img/contoh11.jpg')}}" class="card-img-top gambar-card-sesi3"
                                    alt="...">
                                <div class="card-body">
                                    <p class="card-text judul-card-sesi3">lapor.go.id</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a target="_blank" href="https://www.lapor.go.id/" style="color: white">
                            <div class="card card-sesi3">
                                <img src="{{asset('assets/img/contoh12.jpg')}}" class="card-img-top gambar-card-sesi3"
                                    alt="...">
                                <div class="card-body">
                                    <p class="card-text judul-card-sesi3">sippn.menpan.go.id</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- data pelayanan publik --}}

{{-- data survei --}}
<section class="sesi4 pt-3 pb-3" id="survey">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="judul-sesi4"><i class="fa fa-check-square-o" aria-hidden="true"></i> Survey Kepuasan
                    Masyarakat (SKM) Online</p>
                <div class="judul-bar4"></div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <p>Untuk mengisi kuesioner Survey Kepuasan Masyarakat (SKM) secara online, silahkan klik tombol dibawah
                    ini :</p>
                <a href="{{route('UserPublikasi_IKM')}}" type=" button" class="tombol-sesi4">Mulai Survey</a>
            </div>
        </div>
        <div class="row mt-2">
            <figure class="highcharts-figure">
                <div id="containerActualType1"></div>
                <p class="highcharts-description">
                </p>
            </figure>
        </div>
    </div>
</section>
{{-- data survei --}}

{{-- data informasi --}}
<section class="sesi5 pt-3" id="informasi">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="judul-sesi5"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Informasi</p>
                <div class="judul-bar5"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="swiffy-slider slider-item-show3 slider-item-nogap slider-nav-dark slider-nav-outside-expand">
            <ul class="slider-container py-4" id="slider2">
                @foreach ($allBerita as $berita)
                {{-- @dd($berita); --}}
                <li>
                    <div class="card shadow h-100">
                        <div class="tile">
                            <img src='{{ asset("images/berita/$berita->gambar_berita") }}' />
                            <div class="text">
                                <h1 class="judul-informasi">{{ $berita->judul_berita }}</h1>
                                <p class="animate-text">
                                    {{-- {!! Illuminate\Support\Str::limit($berita->isi_berita, $limit = 150, $end =
                                    '...')
                                    !!} --}}
                                </p>
                                <a href="{{ route('user_detail_berita', $berita->slug_berita) }}" type="button"
                                    class="tombol-informasi">
                                    <h2 class="animate-text">Baca Selengkapnya >></h2>
                                </a>
                                <div class="dots">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach

                {{-- <li>
                    <div class="card shadow h-100">
                        <div class="tile">
                            <img
                                src='https://images.unsplash.com/photo-1422393462206-207b0fbd8d6b?dpr=1&auto=format&crop=entropy&fit=crop&w=1500&h=1000&q=80' />
                            <div class="text">
                                <h1 class="judul-informasi">Lorem ipsum Bacon ipsum dolor.</h1>
                                <p class="animate-text">Bacon ipsum dolor amet pork belly tri-tip turducken, pancetta
                                    bresaola pork chicken meatloaf. Flank sirloin strip steak prosciutto kevin
                                    turducken. </p>
                                <a href="detail_berita.php" type="button" class="tombol-informasi">
                                    <h2 class="animate-text">Baca Selengkapnya >></h2>
                                </a>
                                <div class="dots">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card shadow h-100">
                        <div class="tile">
                            <img
                                src='https://images.unsplash.com/photo-1422393462206-207b0fbd8d6b?dpr=1&auto=format&crop=entropy&fit=crop&w=1500&h=1000&q=80' />
                            <div class="text">
                                <h1 class="judul-informasi">Lorem ipsum Bacon ipsum dolor.</h1>
                                <p class="animate-text">Bacon ipsum dolor amet pork belly tri-tip turducken, pancetta
                                    bresaola pork chicken meatloaf. Flank sirloin strip steak prosciutto kevin
                                    turducken. </p>
                                <a href="detail_berita.php" type="button" class="tombol-informasi">
                                    <h2 class="animate-text">Baca Selengkapnya >></h2>
                                </a>
                                <div class="dots">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card shadow h-100">
                        <div class="tile">
                            <img
                                src='https://images.unsplash.com/photo-1422393462206-207b0fbd8d6b?dpr=1&auto=format&crop=entropy&fit=crop&w=1500&h=1000&q=80' />
                            <div class="text">
                                <h1 class="judul-informasi">Lorem ipsum Bacon ipsum dolor.</h1>
                                <p class="animate-text">Bacon ipsum dolor amet pork belly tri-tip turducken, pancetta
                                    bresaola pork chicken meatloaf. Flank sirloin strip steak prosciutto kevin
                                    turducken. </p>
                                <a href="detail_berita.php" type="button" class="tombol-informasi">
                                    <h2 class="animate-text">Baca Selengkapnya >></h2>
                                </a>
                                <div class="dots">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li> --}}
            </ul>

            <button type="button" class="slider-nav" aria-label="Go to previous"></button>
            <button type="button" class="slider-nav slider-nav-next" aria-label="Go to next"></button>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tombol-hlm-berita-lainnya mb-5">
                    <a href="{{route('user_semua_berita')}}">Berita Lainnya</a>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- data informasi --}}

{{-- Pegawai Favorit --}}
<style>
    .favorit{
        min-height: 400px;
    }
</style>
<section id="favorit" class="favorit">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="judul-kontak"><i class="fa fa-star" aria-hidden="true"></i> Pegawai Favorit</p>
                <div class="judul-bar-kontak"></div>
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
            @foreach ($pegawaiFavorit as $pf)
                <div class="col-4 text-center">
                    <img src="{{ url('images/pegawai_puskesmas/' . $pf->foto_pegawai) }}" alt=""
                    style="
                    width: 200px;
                    border-radius: 5px;
                    box-shadow: 5px 5px 5px rgb(121, 121, 121);
                    "
                    >
                    <br><br>
                    <h3>{{ $pf->nama_lengkap }}</h3>
                    <span style="font-weight: bold;">{{ $pf->nip }}</span>
                    <br>
                    <span>{{ $pf->status_jabatan }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
{{--  --}}


{{-- Tanya Jawab --}}
<section class="sesi5 pt-3" id="informasi">
    <div class="container pb-5">
        <div class="row">
            <div class="col-12">
                <p class="judul-sesi5"><i class="fa fa-question" aria-hidden="true"></i> Tanya</p>
                <div class="judul-bar5"></div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <form action="{{ route('kirim_pertanyaan') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Pertanyaan</label>
                        <textarea name="pertanyaan" id="pertanyaan" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group mt-4">
                        <button class="btn btn-success"><i class="fa fa-arrow-right"></i> Kirim</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="judul-sesi5"><i class="fa fa-comment"></i> Jawab</p>
            </div>
            @foreach ($pertanyaan as $p)
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{ $loop->iteration }}
                        {{ $p->nama }}
                        @php
                            $timestamp = strtotime($p->created_at);
                            echo date('d-m-Y', $timestamp);
                        @endphp
                        <br>
                        {{ $p->pertanyaan }}
                        <br>
                        {{ $p->jawaban }}
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12 text-center mt-5">
                <button class="btn btn-success btn-outline"><i class="fa fa-search"></i> Lihat Selengkapnya</button>
            </div>
        </div>
    </div>
</section>
{{--  --}}

<!-- KONTAK -->
<section class="kontak pt-3" id="kontak">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="judul-kontak"><i class="fa fa-phone" aria-hidden="true"></i> Kontak</p>
                <div class="judul-bar-kontak"></div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6 col-lg-3 mb-3">
                <div class="row">
                    <div class="col-3 text-center">
                        <i class="fa fa-map-marker ikon-kontak" aria-hidden="true"></i>
                    </div>
                    <div class="col-9">
                        <p class="judul-kontak">Lokasi</p>
                        <p class="isi-kontak">alan Pasa Matua, Matua Hilia, Kec. Matur, Kabupaten Agam, Sumatera Barat
                            26162</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 mb-3">
                <div class="row">
                    <div class="col-3 text-center">
                        <i class="fa fa-phone ikon-kontak" aria-hidden="true"></i>
                    </div>
                    <div class="col-9">
                        <p class="judul-kontak">HP</p>
                        <p class="isi-kontak">0752-61396</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 mb-3">
                <div class="row">
                    <div class="col-3 text-center">
                        <i class="fa fa-envelope ikon-kontak" aria-hidden="true"></i>
                    </div>
                    <div class="col-9">
                        <p class="judul-kontak">Email</p>
                        <p class="isi-kontak">Puskesmasmatur@ymail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 mb-3">
                <div class="row">
                    <div class="col-3 text-center">
                        <i class="fa fa-mobile ikon-kontak" aria-hidden="true"></i>
                    </div>
                    <div class="col-9">
                        <p class="judul-kontak">WA</p>
                        <p class="isi-kontak">082170907964</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <iframe class="mt-5 mb-0" {{--
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7590545035027!2d100.02952227396875!3d-0.3122941353350755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd50cde40561d59%3A0x6d8218d63c759221!2sDinas%20Komunikasi%20dan%20Informatika%20Kab.%20Agam!5e0!3m2!1sid!2sid!4v1716857205571!5m2!1sid!2sid"
        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe> --}}

    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7708467142047!2d100.28460197644061!3d-0.27950379971774575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd5406bd648d6a7%3A0x46dface5e5d14bf5!2sPuskesmas%20Matur!5e0!3m2!1sid!2sid!4v1718549628604!5m2!1sid!2sid"
        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
<!-- TUTUP KONTAK -->

<!-- Modal PRofil -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel"></p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Tutup Modal Profil -->

<!-- Modal Pegawai -->
<div class="modal fade" id="ModalPegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel">Pegawai Puskesmas Matur</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container-fluid">
                    <div class="row">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- Tutup Modal Pegawai -->

<!-- Modal Standar Pelayanan -->
<div class="modal fade" id="ModalPelayananPublik" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel"></p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Tutup Modal Standar Pelayanan -->

<!-- Modal Standar Pelayanan -->
{{-- <div class="modal fade" id="ModalPelayananPublik" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel"></p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div> --}}
<!-- Tutup Modal Standar Pelayanan -->

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

<script>
    // $(document).ready(function () {
        // });
        function sejarah() {
           
            // Mengisi konten modal dengan data dari fungsi sejarah
            $('#myModal .modal-title').text('Profile Puskesmas');
            $('#myModal').modal('show');
            $.ajax({
                type: "GET",
                url: "{{ url('ajaxSejarah') }}",
                dataType: "Json",
                success: function(response) {
                    var card = '';
                    var imageUrl = "{{ asset('images/gambar_profile') }}";
                    card += `

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center">
                            <img src="${imageUrl}/${response.gambar_profile_puskesmas}" alt="gambar-modal" class="gambar-modal">
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <p>
                                ${response.sejarah_puskesmas}
                            </p>
                        </div>
                    </div>
                </div>

                    `;
                    
                    $('#myModal .modal-body').empty().append(card);
                }
            });
    }
        function visiMisi() {
            // alert('hello');
            // Mengisi konten modal dengan data dari fungsi visiMisi
            $('#myModal .modal-title').text('Visi Misi Puskesmas Matur');
            $('#myModal').modal('show');
         
            $.ajax({
                type: "GET",
                url: "{{ url('ajaxVisiMisi') }}",
                dataType: "Json",
                success: function(response) {
                console.log(response);
                        var visi_Misi = '';
                        visi_Misi += `

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="card-title">Visi</h1>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">Puskesmas Matur</h6>
                                        <p class="card-text">"${response.keterangan_visi}"</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="card-title">Misi</h1>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">Puskesmas Matur</h6>
                                        <p class="card-text">
                                            ${response.keterangan_misi}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        `;

                        $('#myModal .modal-body').empty().append(visi_Misi);

                            
                }
            });
        }

        function strukturOrganisasi() {
            // Mengisi konten modal dengan data dari fungsi strukturOrganisasi
            $('#myModal .modal-title').text('Struktur Organisasi');
            // $('#myModal .modal-body').html('Data struktur organisasi yang ingin Anda tampilkan di modal.');
            $('#myModal').modal('show');

            $.ajax({
                type: "GET",
                url: "{{ url('ajaxSejarah') }}",
                dataType: "Json",
                success: function(response) {
                    var imageUrl = "{{ asset('images/struktur_puskesmas') }}";
                    var img = '<img src="' + imageUrl + '/' + response.gambar_struktur_puskesmas +
                        '" width="100%" height="100%" >';
                    $('#myModal .modal-body').html(img);
                }
            });
        }

        function Pegawai() {
            // Mengisi konten modal dengan data dari fungsi Pegawai
            $('#ModalPegawai .modal-title').text('Tenaga Pelaksana');
            // $('#ModalPegawai .modal-body').html('Data tenaga pelaksana yang ingin Anda tampilkan di modal.');
            $('#ModalPegawai').modal('show');

            $.ajax({
                type: "GET",
                url: "{{ url('ajaxPegawai') }}",
                dataType: "Json",
                success: function(response) {
                    console.log(response);
                    var card = '';
                    var cardRow = '<div class="row justify-content-center">';
                    response.forEach(pegawai => {
                        card += `
                
                                <div class="col-6 col-sm-6 col-md-3 col-lg-3 p-2">
                                    <a href="">
                                        <div class="card card-pegawai">
                                            <img src="{{ asset('images/pegawai_puskesmas/${pegawai.foto_pegawai}') }}" alt="" class="gambar-pegawai">
                                            <div class="card-content p-3 isi-card-pegawai nama-pegawai">
                                                <h5>
                                                   ${pegawai.nama_lengkap}
                                                </h5>
                                                <p>
                                                    NIP : ${pegawai.nip}
                                                    <br>
                                                   ${pegawai.golongan_jabatan}
                                                    <br>
                                                    ${pegawai.status_jabatan}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                        `
                    });
                    cardRow += card;

                    cardRow += '</div>'; // Menutup tag div yang berisi row
                    $('#ModalPegawai .modal-body').empty().append(cardRow);
                }
            });
        }

        function standard_pelayanan() {
            // Mengisi konten modal dengan data dari fungsi Pegawai
            $('#ModalPelayananPublik .modal-title').text('Standard Pelayanan');
            // $('#ModalStandarPelayanan .modal-body').html('Data tenaga pelaksana yang ingin Anda tampilkan di modal.');
            $('#ModalPelayananPublik').modal('show');

            $.ajax({
                type: "GET",
                url: "{{ route('ajaxStandardLayanan') }}",
                dataType: "Json",
                success: function (response) {
                    var standardPelayanan = '';
                    var standardPelayananRow = '<div class="container-fluid">';
                    standardPelayananRow += '<div class="row">';
                    
                    response.forEach(resultStandardPelayanan => {
                        // Bangun URL tautan menggunakan variabel resultPelayanan.id_jenis_pelayanan
                        var tautan = "{{ route('UserStandardLayanan', '') }}" + "/" + resultStandardPelayanan.id_standard_pelayanan;

                        standardPelayanan += `
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 mt-3 mb-3">
                                <a href="${tautan}" class="kartu-layanan">
                                    <div class="card kartu-sp">
                                        <div class="row">
                                            <div class="col-4">
                                                <h1>
                                                    <i class="fa fa-hospital-o" aria-hidden="true"></i>
                                                </h1>
                                            </div>
                                            <div class="col-8">
                                                <h3>${resultStandardPelayanan.judul_standard_pelayanan}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>`;
                    });

                    standardPelayananRow += standardPelayanan;
                    standardPelayananRow += '</div></div>'; // Menutup tag div yang berisi row dan container-fluid

                    $('#ModalPelayananPublik .modal-body').empty().append(standardPelayananRow);
                }
            });
        }

        function jenis_pelayanan() {
            // Mengisi konten modal dengan data dari fungsi strukturOrganisasi
            $('#ModalPelayananPublik .modal-title').text('Jenis Jenis Pelayanan');
            $('#ModalPelayananPublik').modal('show');

            $.ajax({
                type: "GET",
                url: "{{ route('ajaxJenisPelayanan') }}",
                dataType: "Json",
                success: function (response) {
                    var jenisPelayanan = '';
                    var jenisPelayananRow = '<div class="container-fluid">';
                    jenisPelayananRow += '<div class="row">';
                    
                    response.forEach(resultPelayanan => {
                        // Bangun URL tautan menggunakan variabel resultPelayanan.id_jenis_pelayanan
                        var tautan = "{{ route('UserJenispelayanan', '') }}" + "/" + resultPelayanan.id_jenis_pelayanan;

                        jenisPelayanan += `
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 mt-3 mb-3">
                                <a href="${tautan}" class="kartu-layanan">
                                    <div class="card kartu-sp">
                                        <div class="row">
                                            <div class="col-4">
                                                <h1>
                                                    <i class="fa fa-hospital-o" aria-hidden="true"></i>
                                                </h1>
                                            </div>
                                            <div class="col-8">
                                                <h3>${resultPelayanan.judul_jenis_pelayanan}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>`;
                    });

                    jenisPelayananRow += jenisPelayanan;
                    jenisPelayananRow += '</div></div>'; // Menutup tag div yang berisi row dan container-fluid

                    $('#ModalPelayananPublik .modal-body').empty().append(jenisPelayananRow);
                }
            });
        }

        function maklumat_pelayanan() {
            // Mengisi konten modal dengan data dari fungsi maklumat_pelayanan
            $('#myModal .modal-title').text('Maklumat Pelayanan Publik');
            $('#myModal').modal('show');
            $.ajax({
                type: "GET",
                url: "{{ url('ajaxMaklumat') }}",
                dataType: "Json",
                success: function(response) {
                    var card = '';
                    var imageUrl = "{{ asset('images/maklumat_pelayanan') }}";
                    card += `
                    <img src="${imageUrl}/${response.gambar_maklumat_pelayanan}" class="card-img-top" width="10%" alt="..." style="margin-bottom: 0.5rem">
                    <p>
                        ${response.judul_maklumat_pelayan}
                    </p>

                    `;
                    
                    $('#myModal .modal-body').empty().append(card);
                }
            });
        }

        $.ajax({
            type: "GET",
            url: "https://rangkiang.agamkab.go.id/api/ikm/ajaxGrafikPenilaian",
            data:{
                kode_instansi:'PS-3',
            },
            success: function (response) {
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
                                  '#388E3C', '#388E3C', '#388E3C', '#388E3C', '#388E3C', '#388E3C',
                                    '#388E3C', '#388E3C', '#388E3C'
                        ],
                        colorByPoint: true,
                        groupPadding: 0,
                        data: 
                        [
                            ['Persyaratan Pelayanan', nilai[0]],
                            ['Prosedur Pelayanan', nilai[1]],
                            ['Kecepatan Pelayanan', nilai[2]],
                            ['Biaya Pelayanan', nilai[3]],
                            ['Produk Pelayanan', nilai[4]],
                            ['Kemampuan Petugas Pelayanan', nilai[5]],
                            ['Perilaku Petugas Pelayanan', nilai[6]],
                            ['Kualitas Sarana dan Prasarana Pelayanan', nilai[7]],
                            ['Penanganan Pengaduan Pelayanan', nilai[8]],
                        ]
                        ,
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
@endsection