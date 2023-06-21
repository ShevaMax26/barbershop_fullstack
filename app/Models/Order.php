<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'branch_id',
        'barber_id',
        'scheduled_time',
        'customer_name',
        'customer_phone',
        'payment_status',
        'total_price',
    ];
    protected static $unguarded = false;

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'order_services');
    }
}
