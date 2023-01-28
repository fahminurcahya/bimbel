<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapMapelToKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_mapel_to_kelas', function (Blueprint $table) {
            $table->increments('id_map_mapel_to_kelas');
            $table->unsignedInteger('id_kelas');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas');
            $table->unsignedInteger('id_mapel');
            $table->foreign('id_mapel')->references('id_mapel')->on('mapel');
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
        Schema::create('map_mapel_to_kelas', function (Blueprint $table) {
            $table->dropForeign(['id_kelas']);
            $table->dropForeign(['id_mapel']);
        });
        Schema::dropIfExists('map_mapel_to_kelas');
    }
}
