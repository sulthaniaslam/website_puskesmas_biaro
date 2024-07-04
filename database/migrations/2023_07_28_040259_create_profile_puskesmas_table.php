<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilePuskesmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_puskesmas', function (Blueprint $table) {
            $table->bigIncrements('id_profile_puskesmas');
            $table->text('sejarah_puskesmas');
            $table->text('gambar_profile_puskesmas');
            $table->string('gambar_struktur_puskesmas', '100');
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
        Schema::dropIfExists('profile_puskesmas');
    }
}
