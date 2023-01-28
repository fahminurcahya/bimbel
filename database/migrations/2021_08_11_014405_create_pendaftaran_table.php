<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->Increments('id_daftar');
            $table->string('nama');
            $table->string('tanggal_lahir');
            $table->string('kota_lahir');
            $table->string('orang_tua');
            $table->text('alamat');
            $table->string('no_hp_ortu');
            $table->string('asal_sekolah');
            $table->string('info_ssc');
            $table->string('pembayaran');
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
        Schema::dropIfExists('pendaftaran');
    }
}
