<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barber extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'surname',
        'phone',
        'rank_id',
        'branch_id',
        'image',
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
}
