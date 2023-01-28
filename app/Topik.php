<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Topik extends Model
{
    use SoftDeletes;
    protected $table = 'topik';
    protected $primaryKey = 'id_topik';
    protected $fillable = [
        'nama', 'deskripsi', 'is_aktif'
    ];
}
