<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{

    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_daftar';
    protected $fillable = [
        'id_daftar', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'kota_lahir', 'orang_tua',
        'alamat', 'no_hp_ortu', 'no_hp', 'asal_sekolah', 'jenjang', 'info_ssc', 'pembayaran'
    ];

    public function getTanggalLahirAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['tanggal_lahir'])->format('d F Y');
    }
}
