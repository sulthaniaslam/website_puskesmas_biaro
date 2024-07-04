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
                            <label for="example-text-input" class="form-control-label">Keterangan Berkas</label>
                            <textarea class="text-area" id="keterangan_berkas" name="keterangan_berkas"
                                placeholder="Sejarah Negari">{{ $edit->keterangan_berkas }}</textarea>
                        </div>
                        <div id="validationKeteranganBerkas" class="invalid-feedback"></div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Gambar Berkas Layanan
                                Publik</label>
                            <input class="form-control" id="gambarBerkas" name="gambarBerkas" type="file"
                                onchange="gambarBerkasOrganisasi();">
                            <div id="validationgambarBerkas" class="invalid-feedback"></div>
                        </div>


                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Struktur Organisasi</label>
                            <br>
                            @if ($edit->gambar_berkas)
                            <img id="slide-image-berkas"
                                src='{{ asset("images/berkas_layanan_publik/$edit->gambar_berkas") }}' width="200"
                                alt="Gambar Template">
                            @else
                            <img id="slide-image-berkas" class="my-3" width="200"
                                src="{{ asset('images/default_image.png') }}" />
                            @endif

                        </div>

                        <span style="color:red; font-style: italic;" class="mb-5">Catatan : Posisi Gambar
                            Harus Potrait</span>
                        <br> <br>
                        <button onclick="update()" type="button" class="btn btn-primary">Update Data</button>
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
    CKEDITOR.replace('keterangan_berkas');
        CKEDITOR.replace('tentang_puskesmas');
</script>
@endsection

@push('script')
<script>
    function gambarBerkasOrganisasi() {
            document.getElementById("slide-image-berkas").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("gambarBerkas").files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById("slide-image-berkas").src = oFREvent.target.result;
            };
        };
</script>

<script>
    function update() {
            var keterangan_berkas = CKEDITOR.instances.keterangan_berkas.getData();
            var gambarBerkas = $('#gambarBerkas')[0].files;
            // if (fileProfile.length > 0) {
            var fd = new FormData();
            fd.append('keterangan_berkas', keterangan_berkas);
            fd.append('gambarBerkas', gambarBerkas[0]);
            fd.append('_token', "{{ csrf_token() }}");
            // formData.append("_method", "put");
            $.ajax({
                url: "{{ route('update_berkas', $edit->id_berkas_layanan_publik) }}",
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
                        if (data.gambarBerkas) {
                            ;
                            let validationKeteranganBerkas = document.getElementById('validationKeteranganBerkas')
                            // gambarBerkas.classList.add("is-invalid")
                            validationKeteranganBerkas.innerText = data.gambarBerkas[0]
                            validationKeteranganBerkas.style.display = "block"

                        }
                        if (data.keterangan_berkas) {
                            let validationGambarSejarah = document.getElementById('validationGambarSejarah')
                            // keterangan_berkas.classList.add("is-invalid")
                            validationGambarSejarah.innerText = data.keterangan_berkas[0]
                            validationGambarSejarah.style.display = "block"

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
                                "{{ route('berkas_layanan_publik') }}"
                        })
                    }

                },
            });

        }




        function back() {
            window.location.href = "{{ route('berkas_layanan_publik') }}"
        }
</script>
@endpush