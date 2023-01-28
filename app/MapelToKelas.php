<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapelToKelas extends Model
{
    protected $table = 'map_mapel_to_kelas';
    protected $primaryKey = 'id_map_mapel_to_kelas';
    protected $fillable = [
        'id_kelas', 'id_mapel'
    ];
}
