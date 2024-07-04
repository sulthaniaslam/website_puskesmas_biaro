@extends('layouts.admin')
@section('title_admin', 'Publikasi IKM')

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
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Periode Tahun</th>
                                    <th>Periode Bulan</th>
                                    <th>Jumlah Responden</th>
                                    <th>Pelayanan Farmasi</th>
                                    <th>Pelayanan Kesehatan Gigi Dan Mulut</th>
                                    <th>Pelayanan KIA, KB dan imunisasi</th>
                                    <th>Pelayanan labolatorium</th>
                                    <th>Pelayanan pemeriksaan khusus</th>
                                    <th>Pelayanan pemeriksaan umum</th>
                                    <th>Pelayanan pendaftaran dan rekam medis</th>
                                    <th>Pelayanan pendaftaran dan rekam medis</th>
                                    <th>Pelayanan Tindakan dan Gawat
                                        Darurat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="tampilan_data">
                                @foreach ($indexs as $index)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $index->periode_tahun }}</td>
                                    <td>{{ $index->periode_bulan }}</td>
                                    <td>{{ $index->jumlah_responden }}</td>
                                    <td>{{ $index->farmasi }} / %</td>
                                    <td>{{ $index->gigi_dan_mulut }} / %</td>
                                    <td>{{ $index->kia_kb_imunisasi }} / %</td>
                                    <td>{{ $index->laboratorium }} / %</td>
                                    <td>{{ $index->pemeriksaan_khusus }} / %</td>
                                    <td>{{ $index->pemeriksaan_umum }} / %</td>
                                    <td>{{ $index->pendaftaran_rekam_medis }} / %</td>
                                    <td>{{ $index->tindakan_dan_gawat_darurat }} / %</td>
                                    <td>{{ $index->nilai_ikm }} / %</td>
                                    <td>
                                        <span class="badge badge bg-success mb-1" data-toggle="tooltip"
                                            data-placement="top" title="Hapus">
                                            <a href="{{ route('edit_ikm', Crypt::encrypt($index->id_publikasi_ikm)) }}"
                                                class="btn btn" style="padding: 0.2rem 0.3rem; font-size: 1rem;">
                                                <i class="fas fa-pencil-alt" style="font-size: 1.2rem;"></i>
                                            </a>
                                        </span>

                                        <form method="POST" id="formHeroDelete">
                                            @method('delete')
                                            @csrf
                                            <button type="button"
                                                onclick="hapusPublikasi_ikm('{{ $index->id_publikasi_ikm }}')"
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
    function tambahData() {
            window.location.href = "{{ route('add_ikm') }}"
        }

    function hapusPublikasi_ikm(id) {
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
                            url: "{{ route('hapus_ikm') }}",
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
                                    window.location.href = "{{ route('publikasi_ikm') }}"
                                })
                            }
                        });
                    }
                })
        }
</script>
@endpush