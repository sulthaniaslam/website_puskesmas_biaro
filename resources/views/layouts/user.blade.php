<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="msapplication-TileImage" content="Website Puskesmas Matur">
    <title>Puskesmas Biaro</title>

    <!-- fb & Whatsapp -->

    <!-- Site Name, Title, and Description to be displayed -->
    <meta property="og:site_name" content="https://puskesmasmatur.agamkab.go.id/">
    <meta property="og:title" content="Website Puskesmas Matur">
    <meta property="og:description" content="Website Resmi Pukesmas Nagari Matur Kabupaten Agam">

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

    <title>@yield('title_user')</title>
    <meta content="Website Resmi Pukesmas Nagari Matur Kabupaten Agam" name="description">
    <meta content="Website Puskesmas Matur" name="keywords">

    <!-- Meta tag untuk penulis -->
    <meta name="author" content="Yoga Tri Wahyudi S.Kom">

    <!-- Meta tag untuk nama situs di Google -->
    <meta itemprop="name" content="Nama Situs Anda">
    <meta itemprop="description"
        content="
Website Puskesmas yang dikembangkan oleh software engineer YOGA TRI WAHYUDI, S.Kom dari Diskominfo Agam, menawarkan solusi digital yang inovatif untuk pelayanan kesehatan masyarakat.">

    <link rel="canonical" href="https://puskesmasmatur.agamkab.go.id/">
    <link rel="canonical" href="https://puskesmasmatur.agamkab.go.id/user_semua_berita">

    <meta name="googlebot" content="index, follow">
    <meta name="bingbot" content="index, follow">
    <meta name="robots" content="index, follow">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

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
    </style>

</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

        <nav class="menu-utama navbar-custom navbar mask-custom navbar-expand-md fixed-top bsb-navbar bsb-navbar-hover bsb-navbar-caret" aria-label="Fourth navbar example">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('assets/img/puskesmas.svg') }}" height="50" alt="logo" class="m-2"> PUSKESMAS BIARO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample04">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#profil">Profil Puskesmas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#jadwaltarif">Jadwal & Tarif</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#layanan">Layanan Publik</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pengaduan</a>
                            <ul class="dropdown-menu border-0 shadow bsb-zoomIn">
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#ModalMekanismeAlur">Mekanisme Alur</a></li>
                                <li><a class="dropdown-item" href="#">SK Pengaduan</a></li>
                                <li><a class="dropdown-item" href="#">SK Kompensasi</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#informasi">Informasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#kontak">Kontak</a>
                        </li>
                    </ul>
                    <div class="text-end">
                        <a href=""><i class="fa fa-facebook-square ikon-sosmed" aria-hidden="true"></i></a>
                        <a href=""><i class="fa fa-instagram ikon-sosmed" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </nav>
        @yield('content_user')
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->

    <!-- <section> begin ============================-->

    @include('includes.frontend.footer')
    @include('includes.frontend.script')

</body>

</html>