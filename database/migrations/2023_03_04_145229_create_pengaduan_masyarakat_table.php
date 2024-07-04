<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduanMasyarakatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan_masyarakat', function (Blueprint $table) {
            $table->bigIncrements('id_pengaduan_masyarakat');
            $table->string('nama_lengkap', '100');
            $table->text('nik');
            $table->string('email', '50');
            $table->string('jenis_pengaduan', '50');
            $table->text('pengaduan');
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
        Schema::dropIfExists('pengaduan_masyarakat');
    }
}
