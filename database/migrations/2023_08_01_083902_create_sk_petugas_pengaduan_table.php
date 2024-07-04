<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkPetugasPengaduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sk_petugas_pengaduan', function (Blueprint $table) {
            $table->bigIncrements('id_sk_petugas_pengaduan');
            $table->string('keterangan_sk_petugas_pengaduan', '200');
            $table->string('file_sk_petugas_pengaduan', '70');
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
        Schema::dropIfExists('sk_petugas_pengaduan');
    }
}
