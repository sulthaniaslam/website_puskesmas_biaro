<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasiPuskesmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi_puskesmas', function (Blueprint $table) {
            $table->bigIncrements('id_informasi_puskesmas');
            $table->string('lokasi');
            $table->string('email', '100');
            $table->string('nohp', '15');
            $table->string('nowa', '15');
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
        Schema::dropIfExists('informasi_puskesmas');
    }
}
