<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TesSoal extends Model
{
    protected $table = 'ssc_soal';
    protected $primaryKey = 'id_ssc_soal';
    protected $fillable = [
        'id_ssc_user', 'id_soal', 'ssc_nilai', 'ssc_jawaban_text',
        'ssc_creation_time', 'ssc_display_time', 'ssc_change_time',
        'ssc_reaction_time', 'ssc_order',
        'ssc_num_answer', 'ssc_comment', 'ssc_audio_play'
    ];
}
