<?php

namespace App\Services\Reports;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class RecordReport
{
    public function getPopularService(): object
    {
        return DB::table('order_services')
            ->join('services', 'order_services.service_id', '=', 'services.id')
            ->select('order_services.service_id', 'services.title as title', DB::raw('COUNT(*) as order_count'), DB::raw('SUM(order_services.price) as total_price'))
            ->groupBy('order_services.service_id', 'services.title')
            ->orderByDesc('order_count')
            ->get();
    }

    public function getOrderCount(): int
    {
        return Order::all()->count();
    }

    public function getOrderStatuses()
    {
        return Order::select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get()
            ->toArray();
    }
}
