<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaklumatPelayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maklumat_pelayanan', function (Blueprint $table) {
            $table->bigIncrements('id_maklumat_pelayanan');
            $table->text('judul_maklumat_pelayan');
            $table->string('gambar_maklumat_pelayanan', '100');
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
        Schema::dropIfExists('maklumat_pelayanan');
    }
}
