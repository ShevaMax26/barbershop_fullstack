<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\Order;
use App\Models\ServiceDetail;
use Carbon\Carbon;

class OrderManager
{
    public function store(array $data)
    {
        $employee = Employee::findOrFail($data['employee_id']);
        $rankId = $employee->rank_id;

        $serviceDetails = ServiceDetail::where('rank_id', $rankId)
            ->whereIn('service_id', $data['services'])
            ->get();

        $start = Carbon::parse($data['start']);
        $duration = $serviceDetails->sum('duration');
        $end = (clone $start)->addMinutes($duration);

        $order = Order::create([
            'employee_id' => $data['employee_id'],
            'date' => $data['date'],
            'start' => $data['start'],
            'end' => $end,
            'customer_name' => $data['customer_name'],
            'customer_phone' => $data['customer_phone'],
        ]);

        foreach ($serviceDetails as $serviceDetail) {
            $order->services()->attach($serviceDetail->service_id, [
                'price' => $serviceDetail->price,
                'duration' => $serviceDetail->duration,
            ]);
        }

        return $order;
    }
}
