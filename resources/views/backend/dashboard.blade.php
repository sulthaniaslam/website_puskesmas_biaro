@extends('layouts.admin')
@section('title_admin', 'Dashboard')

@section('content_admin')

<div class="content">
    <!-- Main content -->

    <div class="page-title">
        <div class="title_left">
            {{-- <h3>Dashboard</h3> --}}
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row mt-4">
        <div class="col-md-12 col-sm-12  ">
            <div class="card">
                <div class="card-body">
                    <marquee behavior="" direction="">
                        <h1>Selamat Datang {{Auth::User()->name}} </h1>
                    </marquee>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="{{route('pegawai_puskesmas')}}">
                                <div class="card text-white" style="background-color: #F39F5A">
                                    <div class="card-body">
                                        <h5 class="text-center">Jumlah Pegawai</h5>
                                        <hr>
                                        <h1 class="text-center"><i class="fa fa-table"></i> {{$pegawai}}
                                        </h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <a href="{{route('berita')}}">
                                    <div class="card-body text-white" style="background-color: #B0578D">
                                        <h5 class="text-center">Jumlah Berita</h5>
                                        <hr>
                                        <h1 class="text-center"><i class="fa fa-table"></i>
                                            {{$berita}}
                                        </h1>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body text-white" style="background-color: #9D76C1">
                                    <h5 class="text-center">Jumlah Survei Kepuasan</h5>
                                    <hr>
                                    <h1 class="text-center"><i class="fa fa-table"></i>
                                        20
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- /.content -->
</div>

</section>
@endsection