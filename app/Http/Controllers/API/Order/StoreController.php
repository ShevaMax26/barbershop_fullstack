<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Order\StoreRequest;
use App\Http\Resources\Order\OrderResource;
use App\Models\Barber;
use App\Models\Order;
use App\Models\ServiceDetail;
use Carbon\Carbon;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
//        $start = Carbon::parse($data['date'])->setTimeFromTimeString($data['start']);

//        $period = CarbonPeriod::create('2018-06-14 10:00', '30 minutes', '2018-06-14 22:00');
//        $periodArray = [];
//        foreach ($period as $time) {
//            $periodArray[] = $time->format('H:i');
//        }

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

        return new OrderResource($order);
    }
}
