@extends('layouts.user')
@section('title_user', 'Daftar Berita Puskesmas Lasi')

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
                                            @foreach ($SemuaBerita as $semua)
                                                {{-- <div class="card mb-3" style="max-width: 540px;"> --}}
                                                <div class="card mb-3">
                                                    <div class="row no-gutters">
                                                        <div class="col-md-4">
                                                            <img src='{{ asset("images/berita/$semua->gambar_berita") }}'
                                                                alt="" width="100%">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $semua->judul_berita }}</h5>
                                                                <p class="card-text">
                                                                    {!! Illuminate\Support\Str::limit($semua->isi_berita, $limit = 300, $end = '...') !!}
                                                                </p>
                                                                @php
                                                                    setlocale(LC_TIME, 'id_ID');
                                                                    $timestamp = '2023-10-06 10:46:35';

                                                                    // Ubah string timestamp ke dalam format waktu Unix
                                                                    $waktu_unix = strtotime($timestamp);

                                                                    $tanggal_indonesia = strftime('%d %B %Y', $waktu_unix);

                                                                @endphp
                                                                <p class="card-text">
                                                                    <small class="text-muted">
                                                                        <i class="bi bi-calendar"></i>
                                                                        {{ $semua->hari_berita }}, {{ $tanggal_indonesia }}
                                                                    </small>
                                                                </p>
                                                                <a href="{{ route('user_detail_berita', $semua->slug_berita) }}"
                                                                    class="btn btn-dark" style="font-size:0.8rem">
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    .headline_berita {
                                        font-size: 0.8rem;
                                        color: gray
                                    }

                                    @media (max-width: 991.98px) {

                                        .berita_baru {
                                            margin-top: 6rem;
                                            /* background-color: red; */
                                        }

                                        .headline_berita {
                                            font-size: 0.5rem;
                                            color: gray
                                        }

                                    }

                                    @media (max-width: 575.98px) {
                                        .berita_baru {
                                            width: 100%;
                                            height: auto;
                                        }

                                        .headline_berita {
                                            font-size: 1rem;
                                            color: gray;
                                        }

                                    }
                                </style>

                                {{-- iklan lainnya --}}
                                <div class="col-md-2">
                                    <span class="headline_berita"><i class="bi bi-newspaper"></i> BERITA
                                        TERBARU</span>
                                    @if (isset($allBerita))

                                        @foreach ($allBerita as $all)
                                            <a href="{{ route('user_detail_berita', $all->slug_berita) }}">
                                                <div class="card">
                                                    <img src='{{ asset("images/berita/$all->gambar_berita") }}'
                                                        class="img-thumbnail" alt="">
                                                    <div class="card-body">
                                                        <p class="card-text" style="font-size: 0.9rem; color:black">
                                                            {{ $all->judul_berita }}
                                                        </p>
                                                    </div>
                                                </div>

                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                                {{-- iklan lainnya --}}
                            </div>




                            <div class="d-flex justify-content-between">Showing {{ $SemuaBerita->firstItem() }} to
                                {{ $SemuaBerita->lastItem() }} of {{ $SemuaBerita->total() }} Entries,
                                {{ $SemuaBerita->links() }}</div>

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
