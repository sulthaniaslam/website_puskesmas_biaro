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

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Gambar Mekanisme ALur
                                Pengaduan</label>
                            <input class="form-control" id="gambarMekanismeAlur" name="gambarMekanismeAlur" type="file"
                                onchange="gambarMekanismeAlurOrganisasi();">
                            <div id="validationgambarMekanismeAlur" class="invalid-feedback"></div>
                        </div>


                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Mekanisme ALur Pengaduan</label>
                            <br>
                            @if ($edit->gambar_alur)
                            <img id="slide-image-mekanisme"
                                src='{{ asset("images/mekanisme_alur/$edit->gambar_alur") }}' width="200"
                                alt="Gambar Template">
                            @else
                            <img id="slide-image-mekanisme" class="my-3" width="200"
                                src="{{ asset('images/default_image.png') }}" />
                            @endif
                        </div>

                        <span style="color:red; font-style: italic;" class="mb-5">Catatan : Posisi Gambar
                            Harus Landscape</span>
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

@push('script')
<script>
    function gambarMekanismeAlurOrganisasi() {
            document.getElementById("slide-image-mekanisme").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("gambarMekanismeAlur").files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById("slide-image-mekanisme").src = oFREvent.target.result;
            };
        };
</script>

<script>
    function update() {
            var gambarMekanismeAlur = $('#gambarMekanismeAlur')[0].files;
            // if (fileProfile.length > 0) {
            var fd = new FormData();
            fd.append('gambarMekanismeAlur', gambarMekanismeAlur[0]);
            fd.append('_token', "{{ csrf_token() }}");
            // formData.append("_method", "put");
            $.ajax({
                url: "{{ route('update_mekanisme', $edit->id_mekanisme_alur) }}",
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
                        if (data.gambarMekanismeAlur) {
                            let validationgambarMekanismeAlur = document.getElementById('validationgambarMekanismeAlur')
                            // gambarMekanismeAlur.classList.add("is-invalid")
                            validationgambarMekanismeAlur.innerText = data.gambarMekanismeAlur[0]
                            validationgambarMekanismeAlur.style.display = "block"

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
                                "{{ route('mekanisme_alur') }}"
                        })
                    }

                },
            });

        }




        function back() {
            window.location.href = "{{ route('mekanisme_alur') }}"
        }
</script>
@endpush