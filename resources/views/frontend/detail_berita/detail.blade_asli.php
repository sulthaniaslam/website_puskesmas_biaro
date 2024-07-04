@extends('layouts.user')
@section('title_user', 'Detail Berita Puskesmas')

@section('content_user')
    <div class="wrapper">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">

        <script type='text/javascript'
            src='https://platform-api.sharethis.com/js/sharethis.js#property=651fcda24b3d990012322d3a&product=sticky-share-buttons'
            async='async'></script>

        {{-- <script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=651fcda24b3d990012322d3a&product=sticky-share-buttons'
        async='async'></script> --}}

        <style>
            #header {
                transition: all 0.5s;
                z-index: 997;
                padding: 15px 0;
                background: rgba(0, 0, 0, 0.8);

            }
        </style>

        <div class="card card-primary card-outline" id="card-mobile">
            <div class="card-body">
                <div class="container">
                    @include('includes.frontend.judul')
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-md-10">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="single-blog">
                                            <div class="single-blog-img">
                                                <a href="blog.html">
                                                    {{-- <img src='{{ asset("images/berita/$publik->gambar_berita") }}'
                                                    alt=""> --}}
                                                    <img src='{{ asset("images/berita/$detail_berita->gambar_berita") }}'
                                                        alt="" class="custom-img">
                                                </a>
                                                <!-- ShareThis BEGIN -->
                                                <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                                                <style>
                                                    .custom-img {
                                                        width: 100%;
                                                        /* Gambar akan mengisi lebar kolom col-md-10 */
                                                        max-height: 600px;
                                                        /* Atur tinggi maksimal sesuai kebutuhan Anda */
                                                        height: auto;
                                                        /* Biarkan tinggi gambar disesuaikan agar gambar tidak terdistorsi */
                                                    }
                                                </style>
                                            </div>
                                            <div class="blog-meta">
                                                @php
                                                    setlocale(LC_TIME, 'id_ID');
                                                    $timestamp = $detail_berita->created_at;

                                                    // Ubah string timestamp ke dalam format waktu Unix
                                                    $waktu_unix = strtotime($timestamp);

                                                    $tanggal_indonesia = strftime('%d %B %Y', $waktu_unix);

                                                @endphp
                                                {{-- <span class="date-type"> --}}
                                                <small class="text-muted">
                                                    <i class="fa fa-calendar"></i> {{ $detail_berita->hari_berita }},
                                                    {{ $tanggal_indonesia }}
                                                </small>
                                                {{-- </span> --}}
                                            </div>
                                            <div class="blog-text mt-3">
                                                <h4>
                                                    <a>{{ $detail_berita->judul_berita }}</a>
                                                </h4>
                                                <p>
                                                <p>
                                                    {!! $detail_berita->isi_berita !!}
                                                </p>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                {{-- iklan lainnya --}}
                                <div class="col-md-2">
                                    <span style="font-size: 0.8rem; color:gray"><i class="bi bi-newspaper"></i> BERITA
                                        TERBARU</span>
                                    @if (isset($allBerita))

                                        @foreach ($allBerita as $all)
                                            <a href="{{ route('user_detail_berita', $all->slug_berita) }}">
                                                <div class="card">
                                                    <img src='{{ asset("images/berita/$all->gambar_berita") }}'
                                                        alt="">
                                                    <div class="card-body">
                                                        <p class="card-text" style="font-size: 0.9rem; color:black;">
                                                            {{ $all->judul_berita }}</p>
                                                    </div>
                                                </div>

                                            </a>
                                        @endforeach
                                        <a href="{{ route('user_semua_berita') }}" class="btn btn-dark"> <span
                                                style="font-size: 0.8rem; color:white;"><i class="bi bi-newspaper"></i>
                                                Berita
                                                Lainnya</span></a>
                                    @endif
                                </div>
                                {{-- iklan lainnya --}}
                            </div>

                            <hr style="border: 1px solid #000000;">


                        </div>
                    </section>


                </div>
            </div>
        </div>

    </div>


    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>

@endsection
