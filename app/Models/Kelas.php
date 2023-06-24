<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materi;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelass';

    protected $fillable = [
        'nama_kelas', 'slug', 'jurusan_id'
    ];

    public function materi()
    {
        return $this->hasMany(Materi::class, 'kelas_id');
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    public function tabMateri()
    {
        return $this->hasMany(TabMateri::class, 'kelas_id', 'id');
    }
}
