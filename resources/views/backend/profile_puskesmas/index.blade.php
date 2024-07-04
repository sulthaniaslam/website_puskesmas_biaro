@extends('layouts.admin')
@section('title_admin', 'Profile Puskesmas')

@section('content_admin')
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline" id="card-mobile" style="
        width: 100%;
        /* align: center; */
        border-radius: 30px;
        background-color: #fff;
        box-shadow: 0px 0px 50px 0px #ccc;
        padding: 10px;">
            <div class=" card-body">
                <div class="container">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Sejarah Puskesmas</th>
                                    <th>Gambar Profile Puskesmas</th>
                                    <th>Gambar Struktur Puskesmas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="tampilan_data">
                                @foreach ($indexs as $index)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{!! $index->sejarah_puskesmas !!}</td>
                                    <td>
                                        <img src='{{ asset("images/gambar_profile/$index->gambar_profile_puskesmas") }}'
                                            width="100" alt="Gambar Profile Puskesmas">
                                    </td>
                                    <td>
                                        <img src='{{ asset("images/struktur_puskesmas/$index->gambar_struktur_puskesmas") }}'
                                            width="100" alt="Gambar Sturuktur Puskesmas">
                                    </td>
                                    <td>
                                        <span class="badge badge bg-success mb-1" data-toggle="tooltip"
                                            data-placement="top" title="Edit">
                                            <a href="{{ route('edit_profile', Crypt::encrypt($index->id_profile_puskesmas)) }}"
                                                class="btn btn" style="padding: 0.2rem 0.3rem; font-size: 1rem;">
                                                <i class="fas fa-pencil-alt" style="font-size: 1.2rem;"></i>
                                            </a>
                                        </span>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script>

</script>
@endpush