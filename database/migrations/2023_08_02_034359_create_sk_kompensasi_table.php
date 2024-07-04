<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkKompensasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sk_kompensasi', function (Blueprint $table) {
            $table->bigIncrements('id_sk_kompensasi');
            $table->string('keterangan_sk_kompensasi', '150');
            $table->string('file_sk_kompensasi', '70');
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
        Schema::dropIfExists('sk_kompensasi');
    }
}
