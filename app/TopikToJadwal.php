<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopikToJadwal extends Model
{
    protected $table = 'ssc_topik_set';
    protected $primaryKey = 'id_set';
    protected $fillable = [
        'id_to', 'id_topik', 'tipe', 'acak_soal',
        'jumlah_soal', 'jumlah_jawaban', 'acak_jawaban'
    ];
}
