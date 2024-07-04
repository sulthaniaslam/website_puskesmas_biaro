<!-- Main Sidebar Container -->
{{-- <aside class="main-sidebar sidebar-light-primary elevation-4"
    style="background: linear-gradient(90deg, hsla(259, 84%, 78%, 1) 0%, hsla(206, 67%, 75%, 1) 100%);"> --}}
    <aside class="main-sidebar sidebar-light-primary elevation-4" style="background-color: #FFE6C7">
        {{-- Untuk logo dinas --}}
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                {{-- <div class="image">
                    <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block ml-3">Alexander Pierce</a>
                </div> --}}
            </div>

            {{-- Untuk logo admin --}}
            <a href="index3.html">
                <div class="ml-4">
                    <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                        class="img-circle elevation-3 ml-5" style="opacity: .8; width:35%;">
                </div>
            </a>

            <!-- Sidebar user panel (optional) -->

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                </div>
                <div class="info">
                    <a href="#" class="d-block ml-4">{{Auth::User()->name}}</a>
                </div>
            </div>
            @php
            $id = Auth::User()->id_user;
            @endphp

            <style>
                .nav-link.active {
                    color: red;
                }
            </style>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-header">Menu</li>
                    <li class="nav-item menu-open">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ set_active('dashboard') }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ set_active('profile_puskesmas') }} {{ set_active('visi_misi') }} 
                    {{ set_active('pegawai_puskesmas') }} {{ set_active('informasi_puskesmas') }}
                    
                    ">
                            <i class="nav-icon fas fa-university"></i>
                            <p>
                                Profile Puskesmas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('profile_puskesmas') }}"
                                    class="nav-link {{ set_active('profile_puskesmas') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Profile Puskesmas</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('visi_misi') }}" class="nav-link {{ set_active('visi_misi') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Visi Misi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pegawai_puskesmas') }}"
                                    class="nav-link {{ set_active('pegawai_puskesmas') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pegawai Puskesmas</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('informasi_puskesmas') }}"
                                    class="nav-link {{ set_active('informasi_puskesmas') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Informasi Puskesmas</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link {{ set_active('berkas_layanan_publik') }} 
                    {{ set_active('standard_pelayanan') }} {{ set_active('jenis_pelayanan') }}
                    ">
                            <i class="nav-icon fas fa-globe"></i>
                            <p>
                                Layanan Publik
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('berkas_layanan_publik') }}"
                                    class="nav-link {{ set_active('berkas_layanan_publik') }} {{ set_active('maklumat_layanan_publik') }} {{ set_active('jenis_pelayanan') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Maklumat Pelayanan</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('standard_pelayanan') }}"
                                    class="nav-link {{ set_active('standard_pelayanan') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Standard Pelayanan</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('maklumat_layanan_publik') }}"
                                    class="nav-link {{ set_active('maklumat_layanan_publik') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Maklumat Pelayanan</p>
                                </a>
                            </li> --}}

                            <li class="nav-item">
                                <a href="{{ route('jenis_pelayanan') }}"
                                    class="nav-link {{ set_active('jenis_pelayanan') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jenis Jenis Pelayanan</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link {{ set_active('jadwal_pelayanan') }} 
                    {{ set_active('tarif_pelayanan') }}
                    ">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Jadwal dan Tarif
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('jadwal_pelayanan') }}"
                                    class="nav-link {{ set_active('jadwal_pelayanan') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jadwal Pelayanan</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('tarif_pelayanan') }}"
                                    class="nav-link {{ set_active('tarif_pelayanan') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tarif Pelayanan</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        {{-- {{ route('pengaduan_masyarakat') }} --}}
                        <a href="#" class="nav-link {{ set_active('mekanisme_alur') }} 
                    {{ set_active('sk_petugas_pengaduan') }} {{ set_active('sk_kompensasi') }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Pengaduan Masyarakat
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('mekanisme_alur') }}"
                                    class="nav-link {{ set_active('mekanisme_alur') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Mekanisme Alur Pengaduan</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('sk_petugas_pengaduan') }}"
                                    class="nav-link {{ set_active('sk_petugas_pengaduan') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SK. Petugas Pengaduan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('sk_kompensasi') }}"
                                    class="nav-link {{ set_active('sk_kompensasi') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SK. Kompensasi</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                                Survei Kepuasan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('profile_puskesmas') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Link Google Form</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('publikasi_ikm') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Publik IKM</p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}


                    <li class="nav-item">
                        <a href="{{ route('berita') }}" class="nav-link {{ set_active('berita') }}">
                            <i class="nav-icon far fa-newspaper"></i>
                            <p>Berita</p>
                        </a>
                    </li>

                    {{-- <li class="nav-item">
                        <a href="{{ route('publikasi_ikm') }}" class="nav-link {{ set_active('publikasi_ikm') }}">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>IKM</p>
                        </a>
                    </li> --}}

                    <li class="nav-item">
                        {{-- {{ route('pengaduan_masyarakat') }} --}}
                        <a href="#" class="nav-link {{ set_active('laporan_ikm') }} 
                    {{ set_active('sk_petugas_pengaduan') }} {{ set_active('sk_kompensasi') }}">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                                Laporan IKM & SKM
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('laporan_ikm') }}" class="nav-link {{ set_active('laporan_ikm') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan IKM</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('laporan_skm') }}" class="nav-link {{ set_active('laporan_skm') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan SKM</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('logout',$id) }}" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>