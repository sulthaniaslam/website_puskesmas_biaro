@extends('layouts.admin')
@section('title_admin', 'SK Kompensasi')

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
                        {{-- <a class="btn btn-primary mb-3" onclick="tambahData()">Tambah Data</a> --}}
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Keterangan Sk Kompensasi</th>
                                    <th>File SK Kompensasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="tampilan_data">
                                @foreach ($indexs as $index)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $index->keterangan_sk_kompensasi }}</td>
                                    <td>
                                        {{-- <iframe src='{{ asset("file/sk_kompensasi/$index->file_sk_kompensasi") }}'
                                            width="600" height="400"></iframe> --}}
                                        <a href='{{ asset("file/sk_kompensasi/$index->file_sk_kompensasi") }}'
                                            target="_blank">Lihat File</a>
                                    </td>
                                    <td>
                                        <span class="badge badge bg-success mb-1">
                                            <a href="{{ route('edit_kompensasi', Crypt::encrypt($index->id_sk_kompensasi)) }}"
                                                class="btn btn" style="padding: 0.2rem 0.3rem; font-size: 1rem;">
                                                <i class="fas fa-pencil-alt" style="font-size: 1.2rem;"></i>
                                            </a>
                                        </span>
                                        {{-- <form method="POST" id="formHeroDelete">
                                            @method('delete')
                                            @csrf
                                            <button type="button"
                                                onclick="hapusKompensasi('{{ $index->id_sk_kompensasi }}')"
                                                class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form> --}}

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
</script>

<script>
    $(document).ready(function() {});

        function tambahData() {
            window.location.href = "{{ route('add_kompensasi') }}"
        }

        function hapusKompensasi(id) {
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
                            url: "{{ route('hapus_kompensasi') }}",
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
                                    window.location.href = "{{ route('sk_kompensasi') }}"
                                })
                            }
                        });
                    }
                })
        }
</script>
@endpush