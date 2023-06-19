<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = ['title'];
    protected static $unguarded = false;

    public function barbers()
    {
        return $this->hasMany(Barber::class);
    }
}