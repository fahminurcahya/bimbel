<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profil';
    protected $primaryKey = 'id_profil';
    protected $fillable = [
        'nama', 'alamat', 'no_tlp', 'email', 'footer', 'logo',
        'logo_filosofi', 'sejarah', 'filosofi', 'visi', 'misi'
    ];
}
