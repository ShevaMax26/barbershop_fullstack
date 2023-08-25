<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Employee extends Authenticatable
{
    use HasFactory, SoftDeletes, HasRoles;
    protected $fillable = [
        'name',
        'surname',
        'phone',
        'email',
        'rank_id',
        'branch_id',
        'image',
        'password',
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static $unguarded = false;

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->surname;
    }

    public function getRoleNameAttribute(): string
    {
        $roleName = $this->roles->first()->name;

        $formattedRoleName = match ($roleName) {
            'super-admin' => 'Ceпер Адмін',
            'admin' => 'Адмін',
            'manager' => 'Менеджер',
            'barber' => 'Барбер',
            default => $roleName,
        };

        return $formattedRoleName;
    }
}
