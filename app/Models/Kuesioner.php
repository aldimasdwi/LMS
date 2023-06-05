<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuesioner extends Model
{
    use HasFactory;

    protected $table = "kuesioner";
    protected $fillable =[
        'user_id',
        'punya_laptop',
        'hafalan_alquran',
        'tokoh_idola',
        'ustad_favorit',
        'masih_merokok',
        'punya_pacar',
        'pernahkah_belajar_dalam_jurusan_yang_dituju',
        'pemahaman_agama',
        'amalan_sunah_yang_sering_dilakukan',
        'mengetahui_pondok_it_dari',
        'skill_yang_dimiliki',
        'pelajaran_yang_disukai',
    ];
}
