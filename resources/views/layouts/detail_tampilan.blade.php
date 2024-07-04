<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Puskesmas Matur</title>
    <meta name="msapplication-TileImage" content="Website Puskesmas Matur">

    <!-- Meta tag untuk penulis -->
    <meta name="author" content="Yoga Tri Wahyudi S.Kom">

    <!-- Meta tag untuk nama situs di Google -->
    <meta itemprop="name" content="Nama Situs Anda">
    <meta itemprop="description"
        content="
Website Puskesmas yang dikembangkan oleh software engineer YOGA TRI WAHYUDI, S.Kom dari Diskominfo Agam, menawarkan solusi digital yang inovatif untuk pelayanan kesehatan masyarakat.">

    <!-- Site Name, Title, and Description to be displayed -->
    <meta property="og:site_name" content="https://puskesmasmatur.agamkab.go.id/">

    <!-- Image to display -->
    <!-- Replace   «example.com/image01.jpg» with your own -->
    <meta property="og:image" content="https://puskesmasmatur.agamkab.go.id/public/images/logo_head.jpeg">

    <!-- No need to change anything here -->
    <meta property="og:type" content="https://puskesmasmatur.agamkab.go.id/" />
    <meta property="og:image:type" content="https://puskesmasmatur.agamkab.go.id/public/images/logo_head.jpeg">

    <!-- Size of image. Any size up to 300. Anything above 300px will not work in WhatsApp -->
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">

    <!-- Website to visit when clicked in fb or WhatsApp-->
    <meta property="og:url" content="https://puskesmasmatur.agamkab.go.id/">
    <link itemprop="thumbnailUrl" href="https://puskesmasmatur.agamkab.go.id/public/images/logo_head.jpeg">

    <title>@yield('title_user_detail')</title>

    <!-- pemanggilan CSS -->
    @include('includes.frontend.css')

    <style>
        .navbar-custom .navbar-brand {
            color: #388E3C;
            font-weight: 900;
            text-shadow: 1px 1px 2px #000;
        }

        .navbar-custom li a {
            font-weight: 700;
        }

        .navbar-custom li a:hover {
            color: #388E3C;
        }

        .mask-custom {
            backdrop-filter: blur(5px);
            background-color: rgba(255, 255, 255, .15);
        }

        .tombol-kembali {
            text-decoration: none;
            font-weight: 700;
            border: 2px solid;
            padding: 5px;
            border-radius: 5px;
            color: #000 !important;
        }

        .tombol-kembali:hover {
            background-color: #388E3C;
        }
    </style>

</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

        <nav class="menu-utama navbar-custom navbar mask-custom navbar-expand-md fixed-top bsb-navbar bsb-navbar-hover bsb-navbar-caret" aria-label="Fourth navbar example">
            <div class="container-fluid d-flex flex-wrap">
                <ul class="nav me-auto">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{-- <img src="../../assets/img/puskesmas.svg" height="50" alt="logo" class="m-2"> PUSKESMAS BIARO --}}
                        <img src="{{ asset('assets/img/puskesmas.svg') }}" height="50" alt="logo" class="m-2"> PUSKESMAS BIARO
                    </a>
                </ul>
                <ul class="nav">
                    <span class="navbar-text text-end d-flex ">
                        <a href="{{ url('/') }}" class="tombol-kembali">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali </a>
                    </span>
                </ul>
            </div>
        </nav>

        @yield('content_detail')
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->

    <!-- <section> begin ============================-->

    @include('includes.frontend.footer')
    @include('includes.frontend.script')

</body>

</html>