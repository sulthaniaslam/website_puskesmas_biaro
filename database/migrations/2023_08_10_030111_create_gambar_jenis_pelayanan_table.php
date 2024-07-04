<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGambarJenisPelayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar_jenis_pelayanan', function (Blueprint $table) {
            $table->bigIncrements('id_gambar_jenis_pelayanan');
            $table->bigInteger('id_jenis_pelayanan');
            $table->string('gambar_jenis_pelayanan', '200');
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
        Schema::dropIfExists('gambar_jenis_pelayanan');
    }
}
