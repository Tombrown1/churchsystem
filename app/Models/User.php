<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'gender',
        'password',
        'role',
        'banned_id',
        'suspension_id',
        'badge',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function details()
    {
        return $this->hasOne(UserDetail::class, 'user_id');
    }

    public function postings()
    {
        return $this->hasMany(Posting::class, 'user_id');
    }
    public function posting()
    {
        return $this->hasOne(Posting::class);
    }

    public function subunit(){
        return $this->belongsTo(Subunit::class);
    }

    public function announcement()
    {
        return $this->hasOne(announcement::class);
    }
    public function trackposting()
    {
        return $this->hasOne(TrackPosting::class);
    }
}
