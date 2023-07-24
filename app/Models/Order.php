<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    const PAYMENT_STATUS_PENDING = 1;
    const PAYMENT_STATUS_PAID = 2;
    const PAYMENT_STATUS_CANCELLED = 3;
    public function getPaymentStatusString(): string
    {
        switch ($this->payment_status) {
            case self::PAYMENT_STATUS_PENDING:
                return 'В очікувані';
            case self::PAYMENT_STATUS_PAID:
                return 'Успішно';
            case self::PAYMENT_STATUS_CANCELLED:
                return 'Скасовано';
            default:
                return '';
        }
    }
    protected $fillable = [
        'barber_id',
        'date',
        'start',
        'end',
        'customer_name',
        'customer_phone',
        'status',
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
        return $this->belongsToMany(Service::class, 'order_services', 'order_id', 'service_id')
            ->withPivot('price', 'duration');
    }

    public function getTotalAmount()
    {
        return $this->services->sum(fn($service) => $service->pivot->price);
    }

    public function getFormattedStartTimeAttribute()
    {
        $date = Carbon::parse($this->date)->setTimeFromTimeString($this->start);
        $date->locale('uk');

        return $date->isoFormat('D MMMM H:mm');
    }
}
