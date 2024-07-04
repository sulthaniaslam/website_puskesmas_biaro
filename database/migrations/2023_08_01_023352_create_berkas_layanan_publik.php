<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasLayananPublik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas_layanan_publik', function (Blueprint $table) {
            $table->bigIncrements('id_berkas_layanan_publik');
            $table->string('gambar_berkas', '100');
            $table->text('keterangan_berkas');
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
        Schema::dropIfExists('berkas_layanan_publik');
    }
}
