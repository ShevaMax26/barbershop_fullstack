<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;
    protected $fillable = ['title'];
    protected static $unguarded = false;

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function serviceDetails()
    {
        return $this->hasMany(ServiceDetail::class);
    }
}
