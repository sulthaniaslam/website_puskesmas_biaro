@extends('layouts.detail_tampilan')
{{-- @section('title_user', 'Daftar Berita Puskesmas Lasi') --}}
<title>{{ $detail_berita->judul_berita }}</title>

@section('content_detail')

<script type='text/javascript'
    src='https://platform-api.sharethis.com/js/sharethis.js#property=651fcda24b3d990012322d3a&product=sticky-share-buttons'
    async='async'></script>

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
                    <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">Detail Berita</a>
                </li>
                {{-- <li class="breadcrumb-item active" aria-current="page">
                    Detail Berita
                </li> --}}
            </ol>
        </nav>
    </div>

    <div class="container body-skm">
        <div class="row">
            <h1 class="judul-deskripsi1">Berita</h1>
        </div>
        <hr>
        @php
        setlocale(LC_TIME, 'id_ID');
        $timestamp = $detail_berita->created_at;

        // Ubah string timestamp ke dalam format waktu Unix
        $waktu_unix = strtotime($timestamp);

        $tanggal_indonesia = strftime('%d %B %Y', $waktu_unix);

        @endphp
        <div class="row g-5">
            <div class="col-md-8">
                <img src='{{ asset("images/berita/$detail_berita->gambar_berita") }}' alt="gambar-berita"
                    class="gambar-berita mb-3">
                {{-- <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    From the Firehose
                </h3> --}}

                <article class="blog-post">
                    <h2 class="display-5 link-body-emphasis mb-1">{{ $detail_berita->judul_berita }}</h2>
                    <p class="blog-post-meta">{{ $detail_berita->hari_berita }},
                        {{ $tanggal_indonesia }}</p>

                    <p> {!! $detail_berita->isi_berita !!}</p>

                </article>

            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    {{-- <div class="p-4 mb-3 bg-body-tertiary rounded">
                        <h4 class="fst-italic">About</h4>
                        <p class="mb-0">Customize this section to tell your visitors a little bit about your
                            publication, writers, content, or something else entirely. Totally up to you.</p>
                    </div> --}}
                    <div>
                        <h4 class="fst-italic">Recent posts</h4>
                        @if (isset($allBerita))
                        <ul class="list-unstyled">
                            @foreach ($allBerita as $all)

                            @php
                            setlocale(LC_TIME, 'id_ID');
                            $timestamp = $detail_berita->created_at;

                            // Ubah string timestamp ke dalam format waktu Unix
                            $waktu_unix = strtotime($timestamp);

                            $tanggal_indonesia_detail = strftime('%d %B %Y', $waktu_unix);

                            @endphp

                            <li>
                                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                    href="{{ route('user_detail_berita', $all->slug_berita) }}">
                                    <img src='{{ asset("images/berita/$all->gambar_berita") }}' width="100%" height="96"
                                        alt="gambar-berita" class="gambar-berita-lainnya d-placeholder-img col-lg-4">
                                    <div class="col-lg-8 p-1">
                                        <h6 class="mb-0 judul-berita-lainnya">{{ $all->judul_berita }}</h6>
                                        <small class="text-body-secondary">{{ $all->hari_berita }},
                                            {{ $tanggal_indonesia_detail }}</small>
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