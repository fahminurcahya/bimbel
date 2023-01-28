<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';
    protected $primaryKey = 'id_jawaban';
    protected $fillable = [
        'id_soal', 'jawaban_desc', 'jawaban_benar', 'is_aktif'
    ];
}
