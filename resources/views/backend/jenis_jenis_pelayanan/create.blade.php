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
                            <label for="example-text-input" class="form-control-label">Judul Jenis Jenis
                                Pelayanan</label>
                            <input type="text" id="judul_jenis_pelayanan" name="judul_jenis_pelayanan"
                                class="form-control" placeholder="Judul Jenis Jenis Pelayanan">
                        </div>
                        <div id="validationJenisPelayanan" class="invalid-feedback"></div>
                        <button onclick="insert()" type="button" class="btn btn-primary">Tambahkan Data</button>
                        <button onclick="back()" type="button" class="btn btn-danger">Kembali</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')

@endsection

@push('script')

<script>
    function insert() {
            var judul_jenis_pelayanan = $('#judul_jenis_pelayanan').val();
            // if (fileProfile.length > 0) {
            var fd = new FormData();
            fd.append('judul_jenis_pelayanan', judul_jenis_pelayanan);
            fd.append('_token', "{{ csrf_token() }}");

            $.ajax({
                url: "{{ route('store_jenis_pelayanan') }}",
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
                        if (data.judul_jenis_pelayanan) {
                            let validationJenisPelayanan = document.getElementById('validationJenisPelayanan')
                            // fileProfile.classList.add("is-invalid")
                            validationJenisPelayanan.innerText = data.fileProfile[0]
                            validationJenisPelayanan.style.display = "block"
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
                                "{{ route('jenis_pelayanan') }}"
                        })
                    }

                },
            });
        }

        function back() {
            window.location.href = "{{ route('jenis_pelayanan') }}"
        }
</script>
@endpush