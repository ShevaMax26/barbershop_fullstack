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
    const PAYMENT_STATUS_CANCELED = 3;
    public function getPaymentStatusString(): string
    {
        switch ($this->payment_status) {
            case self::PAYMENT_STATUS_PENDING:
                return 'В очікувані';
            case self::PAYMENT_STATUS_PAID:
                return 'Успішно';
            case self::PAYMENT_STATUS_CANCELED:
                return 'Скасовано';
            default:
                return '';
        }
    }
    protected $fillable = [
        'employee_id',
        'user_id',
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

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'order_services', 'order_id', 'service_id')
            ->withPivot('price', 'duration');
    }

    public function getTotalAmountAttribute()
    {
        return $this->services->sum(fn($service) => $service->pivot->price);
    }

    public function getFormattedTotalDurationAttribute(): string
    {
        $totalDuration = $this->services->sum(function ($service) {
            return $service->pivot->duration;
        });

        $hours = floor($totalDuration / 60);
        $minutes = $totalDuration % 60;

        if ($hours > 0) {
            if ($minutes > 0) {
                return $hours . ' год. ' . $minutes . ' хв.';
            } else {
                return $hours . ' год.';
            }
        } else {
            return $minutes . ' хв.';
        }
    }

    public function getFormattedStartTimeAttribute(): string
    {
        $date = Carbon::parse($this->date)->setTimeFromTimeString($this->start);
        $date->locale('uk');

        return $date->isoFormat('H:mm');
    }

    public function getFormattedStartDateAttribute(): string
    {
        $date = Carbon::parse($this->date)->setTimeFromTimeString($this->start);
        $date->locale('uk');

        $dayOfWeekTranslations = [
            'Mon' => 'пн',
            'Tue' => 'вт',
            'Wed' => 'ср',
            'Thu' => 'чт',
            'Fri' => 'пт',
            'Sat' => 'сб',
            'Sun' => 'нд',
        ];

        $shortDayOfWeek = $dayOfWeekTranslations[$date->format('D')];

        return $shortDayOfWeek . ', ' . $date->isoFormat('D MMMM');
    }

    public function getFormattedEndTimeAttribute(): string
    {
        $date = Carbon::parse($this->date)->setTimeFromTimeString($this->end);
        $date->locale('uk');

        return $date->isoFormat('H:mm');
    }
}
