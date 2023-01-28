<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $fillable = [
        'nama', 'ttl', 'pendidikan', 'moto', 'gambar_guru', 'pengalaman'
    ];

    public function getTtlAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['ttl'])->format('d F Y');
    }
}
