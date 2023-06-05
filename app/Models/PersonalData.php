<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gelombang',
        'jenis_kelamin',
        'sudah_lulus_sekolah',
        'tanggal_lahir',
        'provinsi',
        'jurusan_yang_dituju',
        'hobi',
        'cita_cita',
        'alamat_rumah',
    ];
}