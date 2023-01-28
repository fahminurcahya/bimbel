<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
    protected $table = 'publish';
    protected $primaryKey = 'id_publish';
    protected $fillable = [
        'judul', 'detail'
    ];
}
