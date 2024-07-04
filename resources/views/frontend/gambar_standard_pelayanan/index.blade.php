@extends('layouts.detail_tampilan')
<title>Gambar Standard Pelayanan</title>
@section('title_user_detail', 'Gambar Standard Pelayanan')

@section('content_detail')
<section class="deskripsi1" id="deskripsi1">
    <div class="container">
        <nav aria-label="breadcrumb breadcrumb-deskripsi">
            <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item">
                    <a class="link-body-emphasis" href="{{route('/')}}">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a class="link-body-emphasis fw-semibold text-decoration-none"
                        href="">@yield('title_user_detail')</a>
                </li>
                {{-- <li class="breadcrumb-item active" aria-current="page">
                    Pelayanan Rawat Jalan
                </li> --}}
            </ol>
        </nav>
    </div>
    {{-- @dd($indexs); --}}
    <style>
        .custom-carousel-control .carousel-control-prev-icon,
        .custom-carousel-control .carousel-control-next-icon {
            background-color: black;
        }
    </style>
    <div class="container body-skm">
        <div class="row">
            <h1 class="judul-deskripsi1">@yield('title_user_detail')</h1>
        </div>
        <hr>
        <div class="row g-5 justify-content-md-center">
            <div class="col-md-8">
                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($indexs as $key => $index)
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{ $key }}"
                            class="{{ $key === 0 ? 'active' : '' }}" aria-current="{{ $key === 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $key + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($indexs as $key => $index)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}" data-bs-interval="5000">
                            <img src='{{ asset("images/standard_pelayanan/$index->gambar_standard_pelayanan") }}'
                                class="d-block w-100 gambar-carousel" alt="...">
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"
                            style="background-color: black"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"
                            style="background-color: black"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
</section>
@endsection