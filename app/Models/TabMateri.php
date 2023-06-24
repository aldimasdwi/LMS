<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabMateri extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'kelas_id'
    ];

    public $timestamps = false;

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
}
