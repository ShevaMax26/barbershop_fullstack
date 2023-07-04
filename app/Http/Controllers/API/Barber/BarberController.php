<?php

namespace App\Http\Controllers\API\Barber;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Barber\AvailableHourRequest;
use App\Http\Resources\Barber\BarberServiceResource;
use App\Models\Barber;
use App\Models\Order;
use App\Models\ServiceDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BarberController extends Controller
{
    public function getServices(Request $request, Barber $barber)
    {
        $services = $barber->rank->serviceDetails()->with('service')->orderBy('service_id', 'asc')->get();

        return BarberServiceResource::collection($services);
    }

    public function getAvailableHours(AvailableHourRequest $request, Barber $barber)
    {
        $data = $request->validated();

        $date = $data['date'];

        $startDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $date . ' 10:00:00');

        $endDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $date . ' 22:00:00');

        $rankId = $barber->rank_id;

        $servicesTime = ServiceDetail::where('rank_id', $rankId)->whereIn('service_id', $data['services'])->sum('duration');

        $availableHours = [];

        $dateOrders = Order::where('barber_id', $barber->id)->where('date', $date)->get();

        // Перебираємо час з інтервалом 30 хвилин
        while ($startDateTime <= $endDateTime) {
            $endServicesTime = (clone $startDateTime)->addMinutes($servicesTime);
            $orderCount = $dateOrders->where('start', '<', $endServicesTime->toTimeString())->where('end', '>', $startDateTime->toTimeString())->count();

            // Якщо немає замовлень, додаємо час до доступних годин
            if ($orderCount === 0 && $endServicesTime <= $endDateTime) {
            $availableHours[] = $startDateTime->format('H:i');
            }

            // Додаємо 30 хвилин до часу
            $startDateTime->addMinutes(30);
        }

        return response()->json(['data' => $availableHours]);
    }

    public function getAvailableDate()
    {

        $currentMonth = now();
        $endMonth = now()->endOfMonth();

        $dates = [];

        $monthDays = [];

        while ($currentMonth < $endMonth) {
            $monthDays[] = $currentMonth->format('d');
            $currentMonth->addDay();
        }
        $dates[] = [
            'month' => now()->format('F'),
            'days' => $monthDays,
        ];

        $monthDays = [];
        $currentMonth = $endMonth->copy()->addDay();
        $nextMonth = $currentMonth->copy()->addMonth();

        while ($currentMonth < $nextMonth) {
            $monthDays[] = $currentMonth->format('d');
            $currentMonth->addDay();
        }
        $dates[] = [
            'month' => now()->addMonth()->format('F'),
            'days' => $monthDays,
        ];

        return response()->json(['data' => $dates]);

    }
}
