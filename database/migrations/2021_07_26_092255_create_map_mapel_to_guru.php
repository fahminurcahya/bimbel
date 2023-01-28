<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapMapelToGuru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_mapel_to_guru', function (Blueprint $table) {
            $table->increments('id_map_mapel_to_guru');
            $table->unsignedInteger('id_guru');
            $table->foreign('id_guru')->references('id_guru')->on('guru');
            $table->unsignedInteger('id_map_mapel_to_kelas');
            $table->foreign('id_map_mapel_to_kelas')->references('id_map_mapel_to_kelas')->on('map_mapel_to_kelas');
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
        Schema::create('map_mapel_to_guru', function (Blueprint $table) {
            $table->dropForeign(['id_guru']);
            $table->dropForeign(['id_map_mapel_to_kelas']);
        });
        Schema::dropIfExists('map_mapel_to_guru');
    }
}
