<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Order\StoreRequest;
use App\Http\Resources\Branch\BranchResource;
use App\Http\Resources\Order\OrderResource;
use App\Models\BarberSchedule;
use App\Models\Branch;
use App\Models\Order;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $order = Order::create([
            'branch_id' => $data['branch_id'],
            'barber_id' => 1,
            'scheduled_date' => $data['scheduled_date'],
            'customer_name' => $data['customer_name'],
            'customer_phone' => $data['customer_phone'],
        ]);

        BarberSchedule::create([
            'barber_id' => 1,
            'scheduled_date' => $data['scheduled_date'],
            'start_time' => $data['start_time'],
            'end_time' => $data['start_time'],
            'is_available' => false,
        ]);

        $order->services()->attach($data['services']);

        return new OrderResource($order);
    }
}
