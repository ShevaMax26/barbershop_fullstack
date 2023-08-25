<?php

namespace App\Http\Controllers\API\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Barber\AvailableHourRequest;
use App\Http\Resources\Barber\BarberServiceResource;
use App\Models\Employee;
use App\Models\Order;
use App\Models\ServiceDetail;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function getServices(Request $request, Employee $employee)
    {
        $services = $employee->rank->serviceDetails()->with('service')->orderBy('service_id', 'asc')->get();

        return BarberServiceResource::collection($services);
    }

    public function getAvailableHours(AvailableHourRequest $request, Employee $employee)
    {
        $data = $request->validated();

        $date = $data['date'];

        $startDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $date . ' 10:00:00');

        if ($startDateTime->isToday()) {
            $startDateTime = max($startDateTime, now()->roundMinute(30));
        }

        $endDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $date . ' 22:00:00');

        $rankId = $employee->rank_id;

        $servicesTime = ServiceDetail::where('rank_id', $rankId)->whereIn('service_id', $data['services'])->sum('duration');

        $availableHours = [];

        $dateOrders = Order::where('employee_id', $employee->id)->where('date', $date)->get();

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
        $currentMonth = CarbonImmutable::now()->startOfMonth();
        $nextMonth = CarbonImmutable::now()->addMonth()->startOfMonth();

        $months = [];

        // Встановлюємо локаль на українську
        App::setLocale('uk');

        while ($currentMonth <= $nextMonth) {
            $month = [
                'month' => $currentMonth->isoFormat('MMMM'),
                'days' => [],
            ];

            $startDay = ($currentMonth == CarbonImmutable::now()->startOfMonth()) ? CarbonImmutable::now()->format('d') : 1;
            $endDay = $currentMonth->daysInMonth;

            for ($day = $startDay; $day <= $endDay; $day++) {
                $currentDate = $currentMonth->copy()->setDay($day);

                $month['days'][] = [
                    'day' => str_pad($day, 2, '0', STR_PAD_LEFT),
                    'date' => $currentDate->format('Y-m-d'),
                ];
            }

            $months[] = $month;
            $currentMonth = $currentMonth->addMonth();
        }

        return response()->json(['data' => $months]);
    }






}
