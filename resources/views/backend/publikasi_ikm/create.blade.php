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
                            <label for="example-text-input" class="form-control-label">Periode Tahun</label>
                            <select id="periode_tahun" name="periode_tahun" class="form-control">
                                <?php
                                // Mendapatkan tahun saat ini
                                $currentYear = date("Y");
                        
                                // Membuat pilihan periode dari tahun 2022 hingga 2030 (atau sejauh yang Anda inginkan)
                                for ($year = 2020; $year <= 2030; $year++) {
                                    echo "<option value=\"$year-" . ($year + 1) . "\">$year-" . ($year + 1) . "</option>";
                                }
                                
                                ?>
                            </select>
                        </div>
                        <div id="validationPeriodeTahun" class="invalid-feedback"></div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Periode Bulan</label>
                            <select id="periode_bulan" name="periode_bulan" class="form-control">
                                <option value="Januari - Juni">Januari - Juni</option>
                                <option value="Juli - Desember">Juli - Desember</option>
                            </select>
                        </div>
                        <div id="validationPeriodeBulan" class="invalid-feedback"></div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Jumlah Responden</label>
                            <input type="text" id="jumlah_responden" name="jumlah_responden" class="form-control"
                                placeholder="Inputkan Jumlah Responden">
                        </div>
                        <div id="validationJumlahResponden" class="invalid-feedback"></div>

                        <label for="example-text-input" class="form-control-label">Pelayanan Farmasi</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="Inputkan Nilai Pelayanan Farmasi"
                                id="farmasi" name="farmasi">
                            <span class="input-group-text">%</span>
                        </div>
                        <div id="validationAnakDanIbu" class="invalid-feedback"></div>

                        <label for="example-text-input" class="form-control-label">Pelayanan Kesehatan Gigi dan
                            Mulut</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control"
                                placeholder="Inputkan Nilai Pelayanan Kesehatan Gigi dan Mulut" id="gigi_dan_mulut"
                                name="gigi_dan_mulut">
                            <span class="input-group-text">%</span>
                        </div>
                        <div id="validationGigiDanMulut" class="invalid-feedback"></div>

                        <label for="example-text-input" class="form-control-label">Pelayanan KIA, KB dan
                            Imunisasi</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control"
                                placeholder="Inputkan Nilai Ruang Kesehatan Ibu dan KB" id="kia_kb_imunisasi"
                                name="kia_kb_imunisasi">
                            <span class="input-group-text">%</span>
                        </div>
                        <div id="validationIbuDanKB" class="invalid-feedback"></div>

                        <label for="example-text-input" class="form-control-label">Pelayanan Laboratorium</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control"
                                placeholder="Inputkan Nilai Pelayanan Laboratorium" id="laboratorium"
                                name="laboratorium">
                            <span class="input-group-text">%</span>
                        </div>
                        <div id="validationLaboratorium" class="invalid-feedback"></div>

                        <label for="example-text-input" class="form-control-label">Pelayanan Pemeriksaan Khusus</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control"
                                placeholder="Inputkan Nilai Pelayanan Pemeriksaan Khusus" id="pemeriksaan_khusus"
                                name="pemeriksaan_khusus">
                            <span class="input-group-text">%</span>
                        </div>
                        <div id="validationPemeriksaanKhusus" class="invalid-feedback"></div>

                        <label for="example-text-input" class="form-control-label">Pelayanan Pemeriksaan Umum</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control"
                                placeholder="Inputkan Nilai Pelayanan Pemeriksaan Umum" id="pemeriksaan_umum"
                                name="pemeriksaan_umum">
                            <span class="input-group-text">%</span>
                        </div>
                        <div id="validationPemeriksaanKhusus" class="invalid-feedback"></div>

                        <label for="example-text-input" class="form-control-label">Pelayanan pendaftaran dan rekam
                            medis</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control"
                                placeholder="Inputkan Nilai Pelayanan pendaftaran dan rekam medis"
                                id="pendaftaran_rekam_medis" name="pendaftaran_rekam_medis">
                            <span class="input-group-text">%</span>
                        </div>
                        <div id="validationRekamMedis" class="invalid-feedback"></div>

                        <label for="example-text-input" class="form-control-label">Pelayanan Tindakan dan Gawat
                            Darurat</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control"
                                placeholder="Inputkan Nilai Pelayanan Tindakan dan Gawat Darurat"
                                id="tindakan_dan_gawat_darurat" name="tindakan_dan_gawat_darurat">
                            <span class="input-group-text">%</span>
                        </div>
                        <div id="validationTindakanDanGawatDarurat" class="invalid-feedback"></div>

                        <label for="example-text-input" class="form-control-label">Nilai IKM</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="Inputkan Nilai Nilai IKM"
                                id="nilai_ikm" name="nilai_ikm">
                            <span class="input-group-text">%</span>
                        </div>
                        <div id="validationNilaiIKM" class="invalid-feedback"></div>
                        <br>
                        <button onclick="insert()" type="button" class="btn btn-primary">Tambahkan Data</button>
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
    function insert() {
            var periode_tahun = $('#periode_tahun').val();
            var periode_bulan = $('#periode_bulan').val();
            var jumlah_responden = $('#jumlah_responden').val();
            var farmasi = $('#farmasi').val();
            var gigi_dan_mulut = $('#gigi_dan_mulut').val();
            var kia_kb_imunisasi = $('#kia_kb_imunisasi').val();
            var laboratorium = $('#laboratorium').val();
            var pemeriksaan_khusus = $('#pemeriksaan_khusus').val();
            var pemeriksaan_umum = $('#pemeriksaan_umum').val();
            var pendaftaran_rekam_medis = $('#pendaftaran_rekam_medis').val();
            var tindakan_dan_gawat_darurat = $('#tindakan_dan_gawat_darurat').val();
            var nilai_ikm = $('#nilai_ikm').val();
            // if (fileProfile.length > 0) {
            var fd = new FormData();
            fd.append('periode_tahun', periode_tahun);
            fd.append('periode_bulan', periode_bulan);
            fd.append('jumlah_responden', jumlah_responden);
            fd.append('farmasi', farmasi);
            fd.append('gigi_dan_mulut', gigi_dan_mulut);
            fd.append('kia_kb_imunisasi', kia_kb_imunisasi);
            fd.append('laboratorium', laboratorium);
            fd.append('pemeriksaan_khusus', pemeriksaan_khusus);
            fd.append('pemeriksaan_umum', pemeriksaan_umum);
            fd.append('pendaftaran_rekam_medis', pendaftaran_rekam_medis);
            fd.append('tindakan_dan_gawat_darurat', tindakan_dan_gawat_darurat);
            fd.append('nilai_ikm', nilai_ikm);
            fd.append('_token', "{{ csrf_token() }}");

            $.ajax({
                url: "{{ route('store_ikm') }}",
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
                        if (data.periode_tahun) {
                            let validationPeriodeTahun = document.getElementById('validationPeriodeTahun')
                            // fileProfile.classList.add("is-invalid")
                            validationPeriodeTahun.innerText = data.periode_tahun[0]
                            validationPeriodeTahun.style.display = "block"
                        }
                        if (data.periode_bulan) {
                            let validationPeriodeBulan = document.getElementById('validationPeriodeBulan')
                            // fileProfile.classList.add("is-invalid")
                            validationPeriodeBulan.innerText = data.periode_bulan[0]
                            validationPeriodeBulan.style.display = "block"
                        }
                        if (data.jumlah_responden) {
                            let validationJumlahResponden = document.getElementById('validationJumlahResponden')
                            // fileProfile.classList.add("is-invalid")
                            validationJumlahResponden.innerText = data.jumlah_responden[0]
                            validationJumlahResponden.style.display = "block"
                        }
                        if (data.farmasi) {
                            let validationAnakDanIbu = document.getElementById('validationAnakDanIbu')
                            // fileProfile.classList.add("is-invalid")
                            validationAnakDanIbu.innerText = data.farmasi[0]
                            validationAnakDanIbu.style.display = "block"
                        }

                        if (data.gigi_dan_mulut) {
                            let validationGigiDanMulut = document.getElementById('validationGigiDanMulut')
                            // fileProfile.classList.add("is-invalid")
                            validationGigiDanMulut.innerText = data.gigi_dan_mulut[0]
                            validationGigiDanMulut.style.display = "block"
                        }

                        if (data.kia_kb_imunisasi) {
                            let validationIbuDanKB = document.getElementById('validationIbuDanKB')
                            // fileProfile.classList.add("is-invalid")
                            validationIbuDanKB.innerText = data.kia_kb_imunisasi[0]
                            validationIbuDanKB.style.display = "block"
                        }

                        if (data.laboratorium) {
                            let validationLaboratorium = document.getElementById('validationLaboratorium')
                            // fileProfile.classList.add("is-invalid")
                            validationLaboratorium.innerText = data.laboratorium[0]
                            validationLaboratorium.style.display = "block"
                        }

                        if (data.pemeriksaan_khusus) {
                            let validationPemeriksaanKhusus = document.getElementById('validationPemeriksaanKhusus')
                            // fileProfile.classList.add("is-invalid")
                            validationPemeriksaanKhusus.innerText = data.pemeriksaan_khusus[0]
                            validationPemeriksaanKhusus.style.display = "block"
                        }

                        if (data.pemeriksaan_umum) {
                            let validationPemeriksaanUmum = document.getElementById('validationPemeriksaanUmum')
                            // fileProfile.classList.add("is-invalid")
                            validationPemeriksaanUmum.innerText = data.pemeriksaan_umum[0]
                            validationPemeriksaanUmum.style.display = "block"
                        }

                        if (data.pendaftaran_rekam_medis) {
                            let validationRekamMedis = document.getElementById('validationRekamMedis')
                            // fileProfile.classList.add("is-invalid")
                            validationRekamMedis.innerText = data.pendaftaran_rekam_medis[0]
                            validationRekamMedis.style.display = "block"
                        }

                        if (data.tindakan_dan_gawat_darurat) {
                            let validationTindakanDanGawatDarurat = document.getElementById('validationTindakanDanGawatDarurat')
                            // fileProfile.classList.add("is-invalid")
                            validationTindakanDanGawatDarurat.innerText = data.tindakan_dan_gawat_darurat[0]
                            validationTindakanDanGawatDarurat.style.display = "block"
                        }

                        if (data.nilai_ikm) {
                            let validationNilaiIKM = document.getElementById('validationNilaiIKM')
                            // fileProfile.classList.add("is-invalid")
                            validationNilaiIKM.innerText = data.nilai_ikm[0]
                            validationNilaiIKM.style.display = "block"
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
                                "{{ route('publikasi_ikm') }}"
                        })
                    }

                },
            });
        }

        function back() {
            window.location.href = "{{ route('publikasi_ikm') }}"
        }
</script>
@endpush