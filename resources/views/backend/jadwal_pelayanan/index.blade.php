@extends('layouts.admin')
@section('title_admin', 'Jadwal Pelayanan')

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
                        <a class="btn btn-primary mb-3" onclick="tambahData()">Tambah Data</a>
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Gambar Jadwal Pelayanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="tampilan_data">
                                @foreach ($indexs as $index)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src='{{ asset("images/jadwal_pelayanan/$index->gambar_jadwal") }}'
                                            width="100" alt="Gambar Jadwal Pelayanan">
                                    </td>
                                    <td>
                                        <span class="badge badge bg-success mb-1" data-toggle="tooltip"
                                            data-placement="top" title="Edit">
                                            <a href="{{ route('edit_jadwal', Crypt::encrypt($index->id_jadwal_pelayanan)) }}"
                                                class="btn btn" style="padding: 0.2rem 0.3rem; font-size: 1rem;">
                                                <i class="fas fa-pencil-alt" style="font-size: 1.2rem;"></i>
                                            </a>
                                        </span>

                                        <form method="POST" id="formHeroDelete">
                                            @method('delete')
                                            @csrf
                                            <button type="button"
                                                onclick="hapusGambarJadwal('{{ $index->id_jadwal_pelayanan }}')"
                                                class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>

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
    $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        function tambahData() {
            window.location.href = "{{ route('add_jadwal') }}"
        }

        function hapusGambarJadwal(id) {
            var id_hapus = id;
            Swal.fire({
                    title: 'Yakin akan menghapus data ini?',
                    text: "Datanya permanen terhapus, kamu tidak dapat mengembalikannya",
                    icon: 'primary',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'jangan hapus'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('hapus_jadwal') }}",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id_hapus": id_hapus
                            },
                            dataType: "JSON",
                            success: function(response) {
                                Swal.fire(
                                    'Berhasil!',
                                    response,
                                    'success'
                                ).then(function() {
                                    window.location.href = "{{ route('jadwal_pelayanan') }}"
                                })
                            }
                        });
                    }
                })
        }

</script>
@endpush