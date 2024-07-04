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
                            <label for="example-text-input" class="form-control-label">Judul Standard Pelayanan</label>
                            <input type="text" id="judul_standard_pelayanan" name="judul_standard_pelayanan"
                                class="form-control" placeholder="Inputkan Judul Standard Pelayanan">
                        </div>
                        <div id="validationStandardPelayanan" class="invalid-feedback"></div>
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
            var judul_standard_pelayanan = $('#judul_standard_pelayanan').val();
            // if (fileProfile.length > 0) {
            var fd = new FormData();
            fd.append('judul_standard_pelayanan', judul_standard_pelayanan);
            fd.append('_token', "{{ csrf_token() }}");

            $.ajax({
                url: "{{ route('store_pelayanan') }}",
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
                        if (data.judul_standard_pelayanan) {
                            let validationStandardPelayanan = document.getElementById('validationStandardPelayanan')
                            // fileProfile.classList.add("is-invalid")
                            validationStandardPelayanan.innerText = data.fileProfile[0]
                            validationStandardPelayanan.style.display = "block"
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
                                "{{ route('standard_pelayanan') }}"
                        })
                    }

                },
            });
        }

        function back() {
            window.location.href = "{{ route('standard_pelayanan') }}"
        }
</script>
@endpush