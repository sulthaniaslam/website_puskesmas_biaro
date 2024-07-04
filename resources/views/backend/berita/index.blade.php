@extends('layouts.admin')
@section('title_admin', 'Berita Puskesmas')

@section('content_admin')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline" id="card-mobile"
                style="
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
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Judul Berita</th>
                                        <th>Isi Berita</th>
                                        <th>Hari Dan Tanggal Berita</th>
                                        <th>Gambar Berita</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="tampilan_data">
                                    @foreach ($beritas as $berita)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $berita->judul_berita }}</td>
                                            <td>{!! $berita->isi_berita !!}</td>
                                            <td>{{ $berita->hari_berita }} /
                                                {{ date('d-m-Y', strtotime($berita->created_at)) }}</td>
                                            <td>
                                                <img src='{{ asset("images/berita/$berita->gambar_berita") }}'
                                                    width="100" alt="Gambar Berita">
                                            </td>
                                            <td>
                                                <span class="badge badge bg-success mb-1">
                                                    <a href="{{ route('edit_berita', Crypt::encrypt($berita->id_berita)) }}"
                                                        class="btn btn" style="padding: 0.2rem 0.3rem; font-size: 1rem;">
                                                        <i class="fas fa-pencil-alt" style="font-size: 1.2rem;"></i>
                                                    </a>
                                                </span>
                                                <form method="POST" id="formHeroDelete">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="button" onclick="hapusBerita('{{ $berita->id_berita }}')"
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
    </script>

    <script>
        $(document).ready(function() {});

        function tambahData() {
            window.location.href = "{{ route('add_berita') }}"
        }

        function hapusBerita(id) {
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
                            url: "{{ url('/admin-puskesmas/hapus_berita/') }}/" + id_hapus,
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
                                    window.location.href = "{{ route('berita') }}"
                                })
                            }
                        });
                    }
                })
        }
    </script>
@endpush
