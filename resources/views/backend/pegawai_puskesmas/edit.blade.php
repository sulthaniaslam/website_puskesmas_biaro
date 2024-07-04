@extends('layouts.admin')
@section('title_admin', 'Update Data')
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
                            <label for="example-text-input" class="form-control-label">Nama Lengkap Pegawai</label>
                            <input type="text" class="form-control" value="{{ $PegawaiPuskesmas->nama_lengkap }}"
                                id="nama_lengkap" placeholder="Inputkan Nama Lengkap Pegawai">
                        </div>
                        <div id="validationNamaJabatan" class="invalid-feedback"></div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">NIP Pegawai</label>
                            <input type="number" class="form-control" value="{{ $PegawaiPuskesmas->nip }}" id="nip"
                                placeholder="Inputkan nip Pegawai">
                        </div>
                        <div id="validationNipJabatan" class="invalid-feedback"></div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Golongan Jabatan</label>
                            <input type="text" class="form-control" value="{{ $PegawaiPuskesmas->golongan_jabatan }}"
                                id="golongan_jabatan" placeholder="Inputkan Golongan Jabatan">
                        </div>
                        <div id="validationGolonganJabatan" class="invalid-feedback"></div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Status Jabatan</label>
                            <input type="text" class="form-control" id="status_jabatan"
                                value="{{ $PegawaiPuskesmas->status_jabatan }}" placeholder="Inputkan Status Jabatan">
                        </div>
                        <div id="validationStatusJabatan" class="invalid-feedback"></div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Foto Pegawai <span
                                    class="font-italic"> (Foto dengan posisi Potrait) </span> </label>
                            <input class="form-control" id="fotoPegawaiPuskesmas" type="file" onchange="FotoPegawai();">
                            <div id="validationfotoPegawaiPuskesmas" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Preview Visi Misi</label>
                            <br>
                            @if ($PegawaiPuskesmas->foto_pegawai)
                            <img id="slide-foto-pegawai" class="my-3" width="200"
                                src='{{ asset("images/pegawai_puskesmas/$PegawaiPuskesmas->foto_pegawai") }}' />
                            @else
                            <img id="slide-foto-pegawai" class="my-3" width="200"
                                src="{{ asset('images/default_image.png') }}" />
                            @endif
                        </div>

                        <button onclick="insert()" type="button" class="btn btn-primary" id="btnSpinner">Update
                            Data</button>
                        <button onclick="back()" type="button" class="btn btn-danger">Kembali</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

{{-- @section('scripts')
<script>
    CKEDITOR.replace('nip');
        CKEDITOR.replace('status_jabatan');
</script>
@endsection --}}

@push('script')
<script>
    function FotoPegawai() {
            document.getElementById("slide-foto-pegawai").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("fotoPegawaiPuskesmas").files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById("slide-foto-pegawai").src = oFREvent.target.result;
            };
        };
</script>

<script>
    var spinner =
            '<span class="spinner-border" style="width: 1.6rem; height: 1.6rem;" role="status" aria-hidden="true"></span>';

    function insert() {
        $('#btnSpinner').html(spinner);

            var fotoPegawaiPuskesmas = $('#fotoPegawaiPuskesmas')[0].files;
            var nama_lengkap = $('#nama_lengkap').val();
            var nip = $('#nip').val();
            var golongan_jabatan = $('#golongan_jabatan').val();
            var status_jabatan = $('#status_jabatan').val();
            // if (fileProfile.length > 0) {
            var fd = new FormData();
            fd.append('fotoPegawaiPuskesmas', fotoPegawaiPuskesmas[0]);
            fd.append('nama_lengkap', nama_lengkap);
            fd.append('nip', nip);
            fd.append('golongan_jabatan', golongan_jabatan);
            fd.append('status_jabatan', status_jabatan);
            fd.append('_token', "{{ csrf_token() }}");


            $.ajax({
                url: "{{ route('update_pegawai_puskesmas', $PegawaiPuskesmas->id_pegawai) }}",
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
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.success,
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function() {
                            window.location.href =
                                "{{ route('pegawai_puskesmas') }}"
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
            window.location.href = "{{ route('pegawai_puskesmas') }}"
        }
</script>
@endpush