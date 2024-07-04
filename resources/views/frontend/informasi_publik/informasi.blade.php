@extends('layouts.user')
@section('title_user', 'Informasi Publik')

@section('content_user')
<div class="wrapper">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <style>
        #header {
            transition: all 0.5s;
            z-index: 997;
            padding: 15px 0;
            background: rgba(0, 0, 0, 0.8);

        }
    </style>

    <div class="card card-success card-outline" id="card-mobile">
        <div class="card-body">
            <div class="container">
                @include('includes.frontend.judul')
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            {{-- <div class="col-md-12">

                                <!-- Profile Image -->
                                <div class="">
                                    @foreach ($profile_nagari as $profile)
                                    <div class="card-body">
                                        <div class="text-center mb-5">
                                            <img src='{{ asset("images/profile_nagari/$profile->gambar_profile_nagari") }}'
                                                alt="Gambar Template" width="50%">
                                        </div>

                                        <p class="text-muted" style="margin-top:100px">
                                            {!!$profile->tentang_nagari!!}
                                        </p>

                                        <hr>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- /.card -->
                            </div> --}}

                            <!-- ======= Kabar Nagari ======= -->
                            <div id="blog" class="blog-area">
                                <div class="blog-inner area-padding">
                                    <div class="blog-overly"></div>
                                    <div class="container ">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="section-headline text-center">
                                                    <h2>Informasi Publik</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- Start Left Blog -->
                                            @foreach ($informasi_Publik as $publik)
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="single-blog">
                                                    <div class="single-blog-img">
                                                        <a href="blog.html">
                                                            <img src='{{ asset("images/berita/$publik->gambar_berita") }}'
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="blog-meta">
                                                        {{-- <span class="comments-type">
                                                            <i class="fa fa-comment-o"></i>
                                                            <a href="#">13 comments</a>
                                                        </span> --}}
                                                        <span class="date-type">
                                                            <i class="fa fa-calendar"></i>{{ $publik->created_at }}
                                                        </span>
                                                    </div>
                                                    <div class="blog-text">
                                                        <h4>
                                                            <a href="blog.html">{{ $publik->judul_berita }}</a>
                                                        </h4>
                                                        <p>
                                                            {!! $publik->isi_berita !!}
                                                        </p>
                                                    </div>
                                                    <span>
                                                        <a href="{{ route('user_detail_berita', Crypt::encrypt($publik->id_berita)) }}"
                                                            class="ready-btn">Baca Selengkapnya</a>
                                                    </span>
                                                </div>
                                                <!-- Start single blog -->
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Kabar Nagari -->
                        </div>

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