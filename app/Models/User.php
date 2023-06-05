<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Artikel;
use App\Models\Pengumuman;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function booted(){
        self::creating(function ($user) {
            $user->status_id = 1;
        });
    }
    public function artikel()
    {
        return $this->hasMany(Artikel::class);
    }

    public function pengumuman()
    {
        return $this->hasMany(Pengumuman::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function personal_data()
    {
        return $this->hasOne(PersonalData::class);
    }
    public function contact()
    {
        return $this->hasOne(Contact::class);
    }
    public function education()
    {
        return $this->hasOne(Education::class);
    }
    public function family()
    {
        return $this->hasOne(Family::class);
    }
    public function kuesioner()
    {
        return $this->hasOne(Kuesioner::class);
    }
}