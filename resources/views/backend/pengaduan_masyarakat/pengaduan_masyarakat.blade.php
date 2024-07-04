@extends('layouts.admin')
@section('title_admin', 'Pengaduan Masyarakat')

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
                                    <th>Nama Lengkap</th>
                                    <th>NIK</th>
                                    <th>Email</th>
                                    <th>Jenis Pengaduan</th>
                                    <th>Pengaduan</th>
                                </tr>
                            </thead>
                            <tbody class="tampilan_data">
                                @foreach ($pengaduan_masyarakat as $pengaduan)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pengaduan->nama_lengkap }}</td>
                                    <td>
                                        {{ Crypt::decrypt($pengaduan->nik) }}
                                    </td>
                                    <td>{{ $pengaduan->email }}</td>
                                    <td>{{ $pengaduan->jenis_pengaduan }}</td>
                                    <td>{!! $pengaduan->pengaduan !!}</td>
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
    $(function() {
            $("#myTable").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#myTable_wrapper .col-md-6:eq(0)');

        });
</script>
@endpush