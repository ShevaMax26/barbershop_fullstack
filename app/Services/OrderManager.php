<?php

namespace App\Services;

use App\Models\Barber;
use App\Models\Order;
use App\Models\ServiceDetail;
use Carbon\Carbon;

class OrderManager
{
    public function store(array $data)
    {
        $barber = Barber::findOrFail($data['barber_id']);
        $rankId = $barber->rank_id;

        $serviceDetails = ServiceDetail::where('rank_id', $rankId)
            ->whereIn('service_id', $data['services'])
            ->get();

        $start = Carbon::parse($data['start']);
        $duration = $serviceDetails->sum('duration');
        $end = (clone $start)->addMinutes($duration);

        $order = Order::create([
            'barber_id' => $data['barber_id'],
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
