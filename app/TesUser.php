<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TesUser extends Model
{
    protected $table = 'ssc_user';
    protected $primaryKey = 'id_ssc_user';
    protected $fillable = [
        'id_siswa', 'id_to', 'ssc_status', 'created_time'
    ];
}
