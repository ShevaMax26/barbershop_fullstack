<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    public const USER_SEX = [
        1 => 'Чоловік',
        2 => 'Жінка',
    ];
    protected $fillable = [
        'name',
        'email',
        'phone',
        'sex',
        'birth',
        'password',
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

    public function getBirthDateAttribute(): string
    {
        return Carbon::parse($this->getAttribute('birth'))->format('d.m.Y');
    }

    const ROLE_ADMIN = 0;
    const ROLE_READER = 1;

    public function getSexNameAttribute(): string
    {
        if ($this->getAttribute('sex') == 1) {
            return 'Чоловік';
        } elseif ($this->getAttribute('sex') == 2) {
            return 'Жінка';
        }
        return '-';
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
