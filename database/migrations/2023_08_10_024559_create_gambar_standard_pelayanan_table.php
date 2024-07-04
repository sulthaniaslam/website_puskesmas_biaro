<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGambarStandardPelayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar_standard_pelayanan', function (Blueprint $table) {
            $table->bigIncrements('id_gambar_standard_pelayanan');
            $table->bigInteger('id_standard_pelayanan');
            $table->string('gambar_standard_pelayanan', '200');
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
        Schema::dropIfExists('gambar_standard_pelayanan');
    }
}
