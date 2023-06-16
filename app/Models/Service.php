<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description'];
    protected static $unguarded = false;

    public function barbers()
    {
        return $this->belongsToMany(Barber::class);
    }

    public function serviceDetails()
    {
        return $this->hasMany(ServiceDetail::class);
    }
}
