<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'ssc_group';
    protected $fillable = [
        'id_to', 'id_kelas'
    ];
}
