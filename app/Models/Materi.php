<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\KategoriMateri;
use Illuminate\Support\Carbon;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materis';

    protected $fillable = [
        'judul', 'slug', 'deskripsi', 'thumbnail', 'user_id', 'kategori_materi_id', 'tersedia',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategoriMateri()
    {
        return $this->belongsTo(KategoriMateri::class);
    }

    public function getThumbnail()
    {
        return 'uploads/img/materi/' . $this->thumbnail;
    }
}
