<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TesJawaban extends Model
{
    protected $table = 'ssc_jawaban';
    protected $fillable = [
        'id_ssc_soal', 'id_jawaban', 'ssc_selected',
        'ssc_order', 'ssc_position'
    ];
}
