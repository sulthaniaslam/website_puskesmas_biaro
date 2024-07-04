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
                            <label for="example-text-input" class="form-control-label">Judul Berita Nagari *</label>
                            <input type="text" class="form-control" id="judul_berita" placeholder="Judul Berita Nagari">
                            <div id="validationJudulBerita" class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Konten Berita Nagari *</label>
                            <textarea class="text-area" id="isi_berita" placeholder="Kontent Berita"></textarea>
                            <div id="validationIsiBerita" class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Gambar Berita Nagari *</label>
                            <input class="form-control" id="gambar_berita" type="file" onchange="gambarBeritaNagari();">
                            <div id="validationGambarBerita" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Preview Berita Nagari</label>
                            <br>
                            <img id="slide-image-berita" class="my-3" width="200"
                                src="{{ asset('images/default_image.png') }}" />
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

@section('scripts')
<script>
    CKEDITOR.replace('isi_berita');
</script>
@endsection

@push('script')
<script>
    function gambarBeritaNagari() {
            document.getElementById("slide-image-berita").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("gambar_berita").files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById("slide-image-berita").src = oFREvent.target.result;
            };
        };
</script>

<script>
    function insert() {
            var judul_berita = $('#judul_berita').val();
            var isi_berita = CKEDITOR.instances.isi_berita.getData();
            var gambar_berita = $('#gambar_berita')[0].files;

            var fd = new FormData();
            fd.append('judul_berita', judul_berita);
            fd.append('isi_berita', isi_berita);
            fd.append('gambar_berita', gambar_berita[0]);
            fd.append('_token', "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('store_berita') }}",
                method: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    var data = response.errors;
                    console.log(data);
                    if (data) {
                        Swal.fire(
                            'Maaf!',
                            'Data nya bermasalah !',
                            'error'
                        )
                        if (data.judul_berita) {
                            let validationJudulBerita = document.getElementById('validationJudulBerita')
                            validationJudulBerita.innerText = data.judul_berita[0]
                            validationJudulBerita.style.display = "block"
                        }

                        if (data.isi_berita) {
                            let validationIsiBerita = document.getElementById('validationIsiBerita')
                            validationIsiBerita.innerText = data.isi_berita[0]
                            validationIsiBerita.style.display = "block"
                        }

                        if (data.gambar_berita) {
                            let validationGambarBerita = document.getElementById('validationGambarBerita')
                            validationGambarBerita.innerText = data.gambar_berita[0]
                            validationGambarBerita.style.display = "block"
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
                                "{{ route('berita') }}"
                        })
                    }

                },
            });
        }

        function back() {
            window.location.href = "{{ route('berita') }}"
        }
</script>
@endpush