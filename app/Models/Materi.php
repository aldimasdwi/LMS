<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Support\Carbon;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materis';

    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'thumbnail',
        'user_id',
        'kelas_id',
        'tersedia',
        'tab_materi_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function getThumbnail()
    {
        return 'uploads/img/materi/' . $this->thumbnail;
    }
}
