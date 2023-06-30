<?php

namespace App\Http\Controllers\API\Barber;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Barber\AvailableHourRequest;
use App\Http\Resources\Barber\BarberServiceResource;
use App\Models\Barber;
use App\Models\Order;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;

class BarberController extends Controller
{
    public function getServices(Barber $barber)
    {
        $services = $barber->rank->serviceDetails()->with('service')->orderBy('service_id', 'asc')->get();

        return BarberServiceResource::collection($services);
    }

    public function getAvailableHours(AvailableHourRequest $request, Barber $barber)
    {
//        $date = $request->validated();
//
//        $period = CarbonPeriod::create('2018-06-14 10:00', '30 minutes', '2018-06-14 22:00');
//        $periodArray = [];
//        foreach ($period as $time) {
//            $periodArray[] = $time->format('H:i');
//        }

        $date = $request->input('date');

// Створюємо об'єкт Carbon з заданою датою і часом початку робочого дня
        $startDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $date . ' 10:00:00');

// Створюємо об'єкт Carbon з заданою датою і часом кінця робочого дня
        $endDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $date . ' 21:30:00');

// Створюємо порожній масив для зберігання доступних годин
        $availableHours = [];

// Перебираємо час з інтервалом 30 хвилин
        while ($startDateTime <= $endDateTime) {
            // Перевіряємо, чи немає замовлень для даного барбера та часу
            $orderCount = Order::where('barber_id', 1)
                ->where('date', $date)
                ->where('start', '<=', $startDateTime->format('H:i:s'))
                ->where('end', '>', $startDateTime->format('H:i:s'))
                ->count();

            // Якщо немає замовлень, додаємо час до доступних годин
            if ($orderCount === 0) {
                $availableHours[] = $startDateTime->format('H:i');
            }

            // Додаємо 30 хвилин до часу
            $startDateTime->addMinutes(30);
        }

// Повертаємо список доступних годин
        return response()->json(['data' => $availableHours]);

    }
}
