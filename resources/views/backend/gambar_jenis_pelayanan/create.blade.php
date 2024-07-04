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
                            <label for="example-text-input" class="form-control-label">Gambar Standard Pelayanan</label>
                            <input class="form-control" id="gambarJenisPelayanan" name="gambarJenisPelayanan"
                                type="file" onchange="gambarJenisPelayananFile();">
                            <div id="validationgambarJenisPelayanan" class="invalid-feedback"></div>
                        </div>


                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Standard Pelayanan</label>
                            <br>
                            <img id="slide-image-pelayanan" class="my-3" width="200"
                                src="{{ asset('images/default_image.png') }}" />
                        </div>

                        <span style="color:red; font-style: italic;" class="mb-5">Catatan : Posisi Gambar
                            Harus Landscape</span>
                        <br> <br>
                        <button onclick="insert()" type="button" class="btn btn-primary">Tambah Data</button>
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
    function gambarJenisPelayananFile() {
            document.getElementById("slide-image-pelayanan").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("gambarJenisPelayanan").files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById("slide-image-pelayanan").src = oFREvent.target.result;
            };
        };
</script>

<script>
    function insert() {
            var gambarJenisPelayanan = $('#gambarJenisPelayanan')[0].files;
            var id_jenis_pelayanan = "{{$id_jenis_pelayanan}}"
            // if (fileProfile.length > 0) {
            var fd = new FormData();
            fd.append('gambarJenisPelayanan', gambarJenisPelayanan[0]);
            fd.append('id_jenis_pelayanan', id_jenis_pelayanan);
            fd.append('_token', "{{ csrf_token() }}");
            // formData.append("_method", "put");
            $.ajax({
                url: "{{ route('store_jenis_pelayanan_gambar') }}",
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
                        if (data.gambarJenisPelayanan) {
                            let validationgambarJenisPelayanan = document.getElementById('validationgambarJenisPelayanan')
                            // gambarJenisPelayanan.classList.add("is-invalid")
                            validationgambarJenisPelayanan.innerText = data.gambarJenisPelayanan[0]
                            validationgambarJenisPelayanan.style.display = "block"

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
                                "{{ route('show_jenis_pelayanan_gambar', $id) }}"
                        })
                    }

                },
            });

        }

        function back() {
            window.location.href = "{{ route('show_jenis_pelayanan_gambar', $id) }}"
        }
</script>
@endpush