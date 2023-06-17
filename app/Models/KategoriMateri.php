<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Materi;

class KategoriMateri extends Model
{
    use HasFactory;

    protected $table = 'kategori_materis';

    protected $fillable = [
        'nama_kategori', 'slug', 'jurusan_id'
    ];

    public function materi()
    {
        return $this->hasMany(Materi::class, 'kategori_materi_id');
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
