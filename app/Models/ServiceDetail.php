<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceDetail extends Model
{
    use HasFactory;

    protected $fillable = ['rank_id', 'service_id', 'duration', 'price'];
    protected static $unguarded = false;

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function getFormattedDurationAttribute(): string
    {
        $hours = floor($this->duration / 60);
        $minutes = $this->duration % 60;

        if ($hours > 0) {
            return $hours . ' год. ' . $minutes . ' хв.';
        } else {
            return $minutes . ' хв.';
        }
    }
}
