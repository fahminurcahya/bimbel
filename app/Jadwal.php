<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'ssc_to';
    protected $primaryKey = 'id_to';
    protected $fillable = [
        'nama_to', 'detail_to', 'waktu_mulai',
        'waktu_akhir', 'durasi', 'ip_range', 'hasil_user', 'detail_user', 'skor_benar', 'skor_salah', 'skor_tidak_menjawab',
        'skor_maksimal', 'token_to'
    ];
}
