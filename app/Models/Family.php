<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $table = "family";
    protected $fillable = [
        'user_id',
        'kondisi_orang_tua',
        'nomor_seluler_orang_tua',
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'gaji_orang_tua_per_bulan',
        'jumlah_saudara',
    ];
}
