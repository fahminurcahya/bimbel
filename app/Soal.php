<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soal';
    protected $primaryKey = 'id_soal';
    protected $fillable = [
        'id_topik', 'soal_detail', 'soal_tipe', 'soal_aktif', 'soal_kunci', 'soal_audio',
        'soal_audio_play'
    ];
}
