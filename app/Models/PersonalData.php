<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    use HasFactory;

    protected $table = "personal_datas";

    protected $fillable = [
        'user_id',
        'jurusan_id',
        'photo',
        'gelombang',
        'jenis_kelamin',
        'sudah_lulus_sekolah',
        'tanggal_lahir',
        'provinsi',
        'hobi',
        'cita_cita',
        'alamat_rumah',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
