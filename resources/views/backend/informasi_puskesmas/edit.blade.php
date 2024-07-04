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
                            <label for="example-text-input" class="form-control-label">Lokasi Puskesmas</label>
                            <input type="text" class="form-control" value="{{$edit->lokasi}}" id="lokasi">
                            <div id="validationLokasi" class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Email Puskesmas</label>
                            <input type="email" class="form-control" value="{{$edit->email}}" id="email">
                            <div id="validationEmail" class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nomor Telepon</label>
                            <input type="number" class="form-control" value="{{$edit->nohp}}" id="nohp">
                            <div id="validationNOHP" class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nomor WA</label>
                            <input type="number" class="form-control" value="{{$edit->nowa}}" id="nowa">
                            <div id="validationNOWA" class="invalid-feedback"></div>
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
            var lokasi = $('#lokasi').val();
            var email = $('#email').val();
            var nohp = $('#nohp').val();
            var nowa = $('#nowa').val();
            // if (fileProfile.length > 0) {
            var fd = new FormData();
            fd.append('lokasi', lokasi);
            fd.append('email', email);
            fd.append('nohp', nohp);
            fd.append('nowa', nowa);
            fd.append('_token', "{{ csrf_token() }}");
            // formData.append("_method", "put");
            $.ajax({
                url: "{{ route('update_informasi', $edit->id_informasi_puskesmas) }}",
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

                        if (data.email) {
                            let validationEmail = document.getElementById('validationEmail')
                            // gambarStandardPelayanan.classList.add("is-invalid")
                            validationEmail.innerText = data.email[0]
                            validationEmail.style.display = "block"
                        }

                        if (data.nohp) {
                            let validationNOHP = document.getElementById('validationNOHP')
                            // gambarStandardPelayanan.classList.add("is-invalid")
                            validationNOHP.innerText = data.nohp[0]
                            validationNOHP.style.display = "block"
                        }

                        if (data.nowa) {
                            let validationNOWA = document.getElementById('validationNOWA')
                            // gambarStandardPelayanan.classList.add("is-invalid")
                            validationNOWA.innerText = data.nowa[0]
                            validationNOWA.style.display = "block"
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
                                "{{ route('informasi_puskesmas') }}"
                        })
                    }

                },
            });

        }




        function back() {
            window.location.href = "{{ route('informasi_puskesmas') }}"
        }
</script>
@endpush