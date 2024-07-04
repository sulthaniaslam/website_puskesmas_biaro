@extends('layouts.admin')
@section('title_admin', 'Edit Data')
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
                        {{-- @method('PUT') --}}

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Sejarah puskesmas</label>
                            <textarea class="text-area" id="sejarah_puskesmas" name="sejarah_puskesmas"
                                placeholder="Sejarah Negari">{{ $edit->sejarah_puskesmas }}</textarea>
                        </div>
                        <div id="validationSejarahpuskesmas" class="invalid-feedback"></div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Gambar Profile Puskesmas</label>
                            <input class="form-control" id="gambarProfile" name="gambarProfile" type="file"
                                onchange="gambarProfileOrganisasi();">
                            <div id="validationgambarProfile" class="invalid-feedback"></div>
                        </div>


                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Profile Puskesmas</label>
                            <br>
                            @if ($edit->gambar_profile_puskesmas)
                            <img id="slide-image-profile"
                                src='{{ asset("images/gambar_profile/$edit->gambar_profile_puskesmas") }}' width="200"
                                alt="Gambar Profile Puskesmas">
                            @else
                            <img id="slide-image-profile" class="my-3" width="200"
                                src="{{ asset('images/default_image.png') }}" />
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Gambar Struktur
                                Organisasi</label>
                            <input class="form-control" id="gambarStruktur" name="gambarStruktur" type="file"
                                onchange="gambarStrukturOrganisasi();">
                            <div id="validationGambarStruktur" class="invalid-feedback"></div>
                        </div>


                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Struktur Organisasi Puskesmas</label>
                            <br>
                            @if ($edit->gambar_struktur_puskesmas)
                            <img id="slide-image-struktur"
                                src='{{ asset("images/struktur_puskesmas/$edit->gambar_struktur_puskesmas") }}'
                                width="200" alt="Gambar Template">
                            @else
                            <img id="slide-image-struktur" class="my-3" width="200"
                                src="{{ asset('images/default_image.png') }}" />
                            @endif

                        </div>

                        <button onclick="update()" type="button" class="btn btn-primary" id="btnSpinner">Update
                            Data</button>
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
    CKEDITOR.replace('sejarah_puskesmas');
        CKEDITOR.replace('tentang_puskesmas');
</script>
@endsection

@push('script')
<script>
    function gambarProfileOrganisasi() {
            document.getElementById("slide-image-profile").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("gambarProfile").files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById("slide-image-profile").src = oFREvent.target.result;
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
    var spinner =
            '<span class="spinner-border" style="width: 1.6rem; height: 1.6rem;" role="status" aria-hidden="true"></span>';
            
    function update() {
        $('#btnSpinner').html(spinner);

            var sejarah_puskesmas = CKEDITOR.instances.sejarah_puskesmas.getData();
            var gambarProfile = $('#gambarProfile')[0].files;
            var gambarStruktur = $('#gambarStruktur')[0].files;
            // if (fileProfile.length > 0) {
            var fd = new FormData();
            fd.append('sejarah_puskesmas', sejarah_puskesmas);
            fd.append('gambarProfile', gambarProfile[0]);
            fd.append('gambarStruktur', gambarStruktur[0]);
            fd.append('_token', "{{ csrf_token() }}");
            // formData.append("_method", "put");
            $.ajax({
                url: "{{ route('update_profile', $edit->id_profile_puskesmas) }}",
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
                        if (data.gambarStruktur) {
                            
                            let validationGambarStruktur = document.getElementById('validationGambarStruktur')
                            // gambarStruktur.classList.add("is-invalid")
                            validationGambarStruktur.innerText = data.gambarStruktur[0]
                            validationGambarStruktur.style.display = "block"

                        }

                        if (data.gambarProfile) {
                            
                            let validationgambarProfile = document.getElementById('validationgambarProfile')
                            // gambarStruktur.classList.add("is-invalid")
                            validationgambarProfile.innerText = data.gambarProfile[0]
                            validationgambarProfile.style.display = "block"

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
                                "{{ route('profile_puskesmas') }}"
                        })
                    }

                },

                complete: function(response) {
                    // Menyembunyikan spinner setelah permintaan selesai
                    $(".spinner-border").hide();
                    // $(".spinner-border").text(Simpan);
                    $('#btnSpinner').html("Update Data");
                },
            });

        }


        function back() {
            window.location.href = "{{ route('profile_puskesmas') }}"
        }
</script>
@endpush