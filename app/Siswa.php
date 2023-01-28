<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $fillable = [
        'nama', 'id_user', 'id_kelas',
        'jenis_kelamin', 'tanggal_lahir', 'kota_lahir', 'orang_tua',
        'alamat', 'no_hp_ortu', 'no_hp', 'asal_sekolah'
    ];
}
