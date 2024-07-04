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
                            <label for="example-text-input" class="form-control-label">Gambar Profile Nagari</label>
                            <input class="form-control" id="gambarProfile" type="file"
                                onchange="gambarProfileNagari();">
                            <div id="validationGambarProfile" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Preview Profile Nagari</label>
                            <br>
                            <img id="slide-image-profile" class="my-3" width="200"
                                src="{{ asset('images/default_image.png') }}" />
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Tentang Nagari</label>
                            <textarea class="text-area" id="tentang_nagari" name="tentang_nagari"
                                placeholder="Tentang Negari"></textarea>
                        </div>
                        <div id="validationTentangNagari" class="invalid-feedback"></div>


                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Gambar Sejarah Nagari</label>
                            <input class="form-control" id="gambarSejarah" name="gambarSejarah" type="file"
                                onchange="gambarSejarahNagari();">
                            <div id="validationGambarSejarah" class="invalid-feedback"></div>
                        </div>


                        <div class="mb-3">
                            <label for="gambar" class="form-label">Preview Sejarah Nagari</label>
                            <br>
                            <img id="slide-image-sejarah" class="my-3" width="200"
                                src="{{ asset('images/default_image.png') }}" />
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Sejarah Nagari</label>
                            <textarea class="text-area" id="sejarah_nagari" name="sejarah_nagari"
                                placeholder="Sejarah Negari"></textarea>
                        </div>
                        <div id="validationSejarahNagari" class="invalid-feedback"></div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Gambar Struktur
                                Organisasi</label>
                            <input class="form-control" id="gambarStruktur" name="gambarStruktur" type="file"
                                onchange="gambarStrukturOrganisasi();">
                            <div id="validationGambarStruktur" class="invalid-feedback"></div>
                        </div>


                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Struktur Organisasi</label>
                            <br>
                            <img id="slide-image-struktur" class="my-3" width="200"
                                src="{{ asset('images/default_image.png') }}" />
                        </div>
                        <span style="color:red; font-style: italic;" class="mb-5">Catatan : Semua Posisi Gambar
                            Harus
                            Landscape</span>
                        <br> <br>
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
    CKEDITOR.replace('sejarah_nagari');
        CKEDITOR.replace('tentang_nagari');
</script>
@endsection

@push('script')
<script>
    function gambarProfileNagari() {
            document.getElementById("slide-image-profile").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("gambarProfile").files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById("slide-image-profile").src = oFREvent.target.result;
            };
        };

        function gambarSejarahNagari() {
            document.getElementById("slide-image-sejarah").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("gambarSejarah").files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById("slide-image-sejarah").src = oFREvent.target.result;
            };
        };

        function gambarStrukturOrganisasi() {
            document.getElementById("slide-image-struktur").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("gambarStruktur").files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById("slide-image-struktur").src = oFREvent.target.result;
            };
        };
</script>

<script>
    function insert() {
            var fileProfile = $('#gambarProfile')[0].files;
            var tentang_nagari = CKEDITOR.instances.tentang_nagari.getData();
            var fileSejarah = $('#gambarSejarah')[0].files;
            var sejarah_nagari = CKEDITOR.instances.sejarah_nagari.getData();
            var gambarStruktur = $('#gambarStruktur')[0].files;
            // if (fileProfile.length > 0) {
            var fd = new FormData();
            fd.append('fileProfile', fileProfile[0]);
            fd.append('tentang_nagari', tentang_nagari);
            fd.append('fileSejarah', fileSejarah[0]);
            fd.append('sejarah_nagari', sejarah_nagari);
            fd.append('gambarStruktur', gambarStruktur[0]);
            fd.append('_token', "{{ csrf_token() }}");

            $.ajax({
                url: "{{ route('store_profile') }}",
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
                        if (data.fileProfile) {
                            let validationGambarProfile = document.getElementById('validationGambarProfile')
                            // fileProfile.classList.add("is-invalid")
                            validationGambarProfile.innerText = data.fileProfile[0]
                            validationGambarProfile.style.display = "block"
                        }
                        if (data.fileSejarah) {
                            let validationGambarSejarah = document.getElementById('validationGambarSejarah')
                            // sejarah_nagari.classList.add("is-invalid")
                            validationGambarSejarah.innerText = data.sejarah_nagari[0]
                            validationGambarSejarah.style.display = "block"
                        }
                        if (data.gambarStruktur) {
                            ;
                            let validationGambarStruktur = document.getElementById('validationGambarStruktur')
                            // gambarStruktur.classList.add("is-invalid")
                            validationGambarStruktur.innerText = data.gambarStruktur[0]
                            validationGambarStruktur.style.display = "block"

                        }
                        if (data.sejarah_nagari) {
                            let validationGambarSejarah = document.getElementById('validationGambarSejarah')
                            // sejarah_nagari.classList.add("is-invalid")
                            validationGambarSejarah.innerText = data.sejarah_nagari[0]
                            validationGambarSejarah.style.display = "block"

                        }

                        if (data.tentang_nagari) {
                            let validationSejarahNagari = document.getElementById('validationSejarahNagari')
                            // tentang_nagari.classList.add("is-invalid")
                            validationSejarahNagari.innerText = data.tentang_nagari[0]
                            validationSejarahNagari.style.display = "block"
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
                                "{{ route('profile_nagari') }}"
                        })
                    }

                },
            });
        }

        function back() {
            window.location.href = "{{ route('profile_nagari') }}"
        }
</script>
@endpush