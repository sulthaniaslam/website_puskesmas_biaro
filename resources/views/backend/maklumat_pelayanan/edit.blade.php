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
                            <label for="example-text-input" class="form-control-label">Maklumat Pelayanan</label>
                            <textarea class="text-area" id="judul_maklumat_pelayan" name="judul_maklumat_pelayan"
                                placeholder="Judul Makulmat Pelayanan">{{ $edit->judul_maklumat_pelayan }}</textarea>
                        </div>
                        <div id="validationMaklumatPelayanan" class="invalid-feedback"></div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Gambar Maklumat Pelayanan</label>
                            <input class="form-control" id="gambarMaklumatPelayanan" name="gambarMaklumatPelayanan"
                                type="file" onchange="gambarMaklumatPelayananOrganisasi();">
                            <div id="validationgambarMaklumatPelayanan" class="invalid-feedback"></div>
                        </div>


                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Maklumat Pelayanan</label>
                            <br>
                            @if ($edit->gambar_maklumat_pelayanan)
                            <img id="slide-image-profile"
                                src='{{ asset("images/maklumat_pelayanan/$edit->gambar_maklumat_pelayanan") }}'
                                width="200" alt="Gambar Maklumat Pelayanan">
                            @else
                            <img id="slide-image-profile" class="my-3" width="200"
                                src="{{ asset('images/default_image.png') }}" />
                            @endif

                        </div>

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
    CKEDITOR.replace('judul_maklumat_pelayan');
</script>
@endsection

@push('script')
<script>
    function gambarMaklumatPelayananOrganisasi() {
            document.getElementById("slide-image-profile").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("gambarMaklumatPelayanan").files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById("slide-image-profile").src = oFREvent.target.result;
            };
        };

</script>

<script>
    function update() {
            var judul_maklumat_pelayan = CKEDITOR.instances.judul_maklumat_pelayan.getData();
            var gambarMaklumatPelayanan = $('#gambarMaklumatPelayanan')[0].files;
            // if (fileProfile.length > 0) {
            var fd = new FormData();
            fd.append('judul_maklumat_pelayan', judul_maklumat_pelayan);
            fd.append('gambarMaklumatPelayanan', gambarMaklumatPelayanan[0]);
            fd.append('_token', "{{ csrf_token() }}");
            // formData.append("_method", "put");
            $.ajax({
                url: "{{ route('update_maklumat', $edit->id_maklumat_pelayanan) }}",
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

                        if (data.gambarMaklumatPelayanan) {
                            
                            let validationgambarMaklumatPelayanan = document.getElementById('validationgambarMaklumatPelayanan')
                            // gambarStruktur.classList.add("is-invalid")
                            validationgambarMaklumatPelayanan.innerText = data.gambarMaklumatPelayanan[0]
                            validationgambarMaklumatPelayanan.style.display = "block"

                        }
                        if (data.judul_maklumat_pelayan) {
                            let validationMaklumatPelayanan = document.getElementById('validationMaklumatPelayanan')
                            // judul_maklumat_pelayan.classList.add("is-invalid")
                            validationMaklumatPelayanan.innerText = data.judul_maklumat_pelayan[0]
                            validationMaklumatPelayanan.style.display = "block"

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
                                "{{ route('maklumat_layanan_publik') }}"
                        })
                    }

                },
            });

        }




        function back() {
            window.location.href = "{{ route('maklumat_layanan_publik') }}"
        }
</script>
@endpush