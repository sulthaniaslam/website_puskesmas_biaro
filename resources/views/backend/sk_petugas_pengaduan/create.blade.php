@extends('layouts.admin')
@section('title_admin', 'Tambah Data')
@section('meta_admin')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content_admin')
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline" style="
        width: 100%;
        /* align: center; */
        border-radius: 30px;
        background-color: #fff;
        box-shadow: 0px 0px 50px 0px #ccc;
        padding: 10px;">
            <div class=" card-body">
                <div class="container">

                    <form enctype="multipart/form-data" method="POST" id="form-data">
                        @csrf

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Keteranggan SK Petugas Pengaduan
                                *</label>
                            <input type="text" class="form-control" id="keterangan_sk"
                                placeholder="Keterangan SK Petugas Pengaduan">
                            <div id="validationKeteranganSK" class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">File SK Petugas Pengaduan .pdf
                                *</label>
                            <input class="form-control" id="file_sk_petugas" type="file">
                            <div id="validationFileSKPetugas" class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            (*) harus diisi
                        </div>

                        <button onclick="insert()" type="button" class="btn btn-primary">Tambahkan Data</button>
                        <button onclick="back()" type="button" class="btn btn-danger">Kembali</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script>
    function insert() {
            var keterangan_sk = $('#keterangan_sk').val();
            var file_sk_petugas = $('#file_sk_petugas')[0].files;

            var fd = new FormData();
            fd.append('keterangan_sk', keterangan_sk);
            fd.append('file_sk_petugas', file_sk_petugas[0]);
            fd.append('_token', "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('store_petugas_pengaduan') }}",
                method: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    var data = response.errors;
                    if (data) {
                        Swal.fire(
                            'Maaf!',
                            'Data nya bermasalah !',
                            'error'
                        )
                        if (data.keterangan_sk) {
                            let validationKeteranganSK = document.getElementById('validationKeteranganSK')
                            validationKeteranganSK.innerText = data.keterangan_sk[0]
                            validationKeteranganSK.style.display = "block"
                        }

                        if (data.file_sk_petugas) {
                            let validationFileSKPetugas = document.getElementById('validationFileSKPetugas')
                            validationFileSKPetugas.innerText = datafile_sk_petugas[0]
                            validationFileSKPetugas.style.display = "block"
                        }

                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.success,
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function() {
                            window.location.href =
                                "{{ route('sk_petugas_pengaduan') }}"
                        })
                    }

                },
            });
        }

        function back() {
            window.location.href = "{{ route('sk_petugas_pengaduan') }}"
        }
</script>
@endpush