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
                            <label for="example-text-input" class="form-control-label">Judul Visi</label>
                            <input type="text" class="form-control" id="judul_visi" value="{{ $edit->judul_visi }}"
                                placeholder="Judul Visi">
                        </div>
                        <div id="validationJudulVisi" class="invalid-feedback"></div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Visi Nagari</label>
                            <textarea class="text-area" id="visi_nagari" placeholder="Visi Nagari">
                                {{ $edit->keterangan_visi }}
                            </textarea>
                        </div>
                        <div id="validationVisiNagari" class="invalid-feedback"></div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Judul Misi</label>
                            <input type="text" class="form-control" id="judul_misi" value="{{ $edit->judul_misi }}"
                                placeholder="Judul Misi">
                        </div>
                        <div id="validationJudulMisi" class="invalid-feedback"></div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Misi Nagari</label>
                            <textarea class="text-area" id="misi_nagari" placeholder="Misi Negari">
                                {{ $edit->keterangan_misi }}
                            </textarea>
                        </div>
                        <div id="validationMisiNagari" class="invalid-feedback"></div>

                        <button onclick="insert()" type="button" class="btn btn-primary">Update Data</button>
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
    CKEDITOR.replace('visi_nagari');
        CKEDITOR.replace('misi_nagari');
</script>
@endsection

@push('script')

<script>
    function insert() {
            var judul_visi = $('#judul_visi').val();
            var visi_nagari = CKEDITOR.instances.visi_nagari.getData();
            var judul_misi = $('#judul_misi').val();
            var misi_nagari = CKEDITOR.instances.misi_nagari.getData();
            // if (fileProfile.length > 0) {
            var fd = new FormData();
            fd.append('judul_visi', judul_visi);
            fd.append('visi_nagari', visi_nagari);
            fd.append('judul_misi', judul_misi);
            fd.append('misi_nagari', misi_nagari);
            fd.append('_token', "{{ csrf_token() }}");


            $.ajax({
                url: "{{ route('update_visi_misi', $edit->id_visi_misi) }}",
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
                                "{{ route('visi_misi') }}"
                        })
                    }

                },
            });
        }

        function back() {
            window.location.href = "{{ route('visi_misi') }}"
        }
</script>
@endpush