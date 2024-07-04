<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublikasiIkmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publikasi_ikm', function (Blueprint $table) {
            $table->bigIncrements('id_publikasi_ikm');
            $table->string('periode_tahun', '100');
            $table->string('periode_bulan', '100');
            $table->bigInteger('jumlah_responden');
            $table->string('farmasi', '50');
            $table->string('gigi_dan_mulut', '50');
            $table->string('kia_kb_imunisasi', '50');
            $table->string('laboratorium', '50');
            $table->string('pemeriksaan_khusus', '50');
            $table->string('pemeriksaan_umum', '50');
            $table->string('pendaftaran_rekam_medis', '50');
            $table->string('tindakan_dan_gawat_darurat', '50');
            $table->string('nilai_ikm', '100');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publikasi_ikm');
    }
}
