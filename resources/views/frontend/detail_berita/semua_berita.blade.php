@extends('layouts.detail_tampilan')
@section('title_user', 'Daftar Berita Puskesmas Lasi')
<title>Daftar Berita Puskesmas Lasi</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="msapplication-TileImage" content="Daftar Berita Puskesmas ">

<meta property="og:site_name" content="https://puskesmaslasi.agamkab.go.id/">
<meta property="og:title" content="Daftar Berita Puskesmas Matur">
<meta property="og:description" content="Daftar Berita Dari Website Resmi Pukesmas Nagari Matur Kabupaten Agam">

<!-- Meta tag untuk penulis -->
<meta name="author" content="Yoga Tri Wahyudi S.Kom">

<!-- Meta tag untuk nama situs di Google -->
<meta itemprop="name" content="Nama Situs Anda">
<meta itemprop="description"
    content="
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

<section class="deskripsi1" id="deskripsi1">
    <div class="container">
        <nav aria-label="breadcrumb breadcrumb-deskripsi">
            <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item">
                    <a class="link-body-emphasis" href="#">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">Daftar Berita</a>
                </li>
                {{-- <li class="breadcrumb-item active" aria-current="page">
                    Berita Lainnya
                </li> --}}
            </ol>
        </nav>
    </div>

    <div class="container body-skm">
        <div class="row">
            <h1 class="judul-deskripsi1">Berita Puskesmas Matur</h1>
        </div>
        <hr>
        <div class="row g-5">
            <div class="col-md-8">
                <div class="col-md-12">
                    @foreach ($SemuaBerita as $semua)
                    @php
                    setlocale(LC_TIME, 'id_ID');
                    $timestamp = $semua->created_at;

                    // Ubah string timestamp ke dalam format waktu Unix
                    $waktu_unix = strtotime($timestamp);

                    $tanggal_indonesia = strftime('%d %B %Y', $waktu_unix);

                    @endphp
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0 judul-berita-lainnya">{{ $semua->judul_berita }}</h3>
                            <div class="mb-1 text-body-secondary tgl-berita-lainnya">{{ $semua->hari_berita }}, {{
                                $tanggal_indonesia }}</div>
                            <p class="card-text mb-auto caption-berita-lainnya"> {!!
                                Illuminate\Support\Str::limit($semua->isi_berita, $limit = 300, $end = '...') !!}</p>
                            {{-- @dd($semua->slug_berita) --}}
                            <a href="{{ route('user_detail_berita', $semua->slug_berita) }}"
                                class="icon-link gap-1 icon-link-hover stretched-link tombol-berita-lainnya">
                                Baca Selengkapnya >>
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src='{{ asset("images/berita/$semua->gambar_berita") }}' width="250" height="250"
                                alt="gambar-berita" class="gambar-berita-lainnya">

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    {{-- <div class="p-4 mb-3 bg-body-tertiary rounded">
                        <h4 class="fst-italic">About</h4>
                        <p class="mb-0">Customize this section to tell your visitors a little bit about your
                            publication, writers, content, or something else entirely. Totally up to you.</p>
                    </div> --}}
                    <div>
                        <h4 class="fst-italic">Berita Terbaru</h4>
                        @if (isset($allBerita))
                        <ul class="list-unstyled">

                            @foreach ($allBerita as $all)
                            @php
                            setlocale(LC_TIME, 'id_ID');
                            $timestamp = $semua->created_at;

                            // Ubah string timestamp ke dalam format waktu Unix
                            $waktu_unix = strtotime($timestamp);

                            $tanggal_indonesia = strftime('%d %B %Y', $waktu_unix);

                            @endphp

                            <li>
                                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                    href="{{ route('user_detail_berita', $all->slug_berita) }}">
                                    <img src='{{ asset("images/berita/$all->gambar_berita") }}' width="100%" height="96"
                                        alt="gambar-berita" class="gambar-berita-lainnya d-placeholder-img col-lg-4">
                                    <div class="col-lg-8 p-1">
                                        <h6 class="mb-0 judul-berita-lainnya">
                                            {{ $all->judul_berita }}</h6>
                                        <small class="text-body-secondary">{{ $semua->hari_berita }}, {{
                                            $tanggal_indonesia }}</small>
                                    </div>
                                </a>
                            </li>
                            @endforeach

                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection