<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $sortField = $request->input('sort', 'id');
        $sortDirection = $request->input('direction', 'asc');

        $orders = Order::with(['branch', 'barber', 'services'])
            ->withSum('services', 'order_services.price')
            ->withCount('services')
            ->when($request->input('search'), function (Builder $q) use ($request) {
                return $q->where('customer_name', $request->input('search'));
            })
            ->when($sortField === 'branches', function ($q) use ($sortDirection) {
                return $q->join('barbers', 'orders.barber_id', '=', 'barbers.id')
                    ->join('branches', 'barbers.branch_id', '=', 'branches.id')
                    ->orderBy('branches.title', $sortDirection)
                    ->select('orders.*');
            })
            ->when(in_array($sortField, ['id', 'customer_name', 'barber_id', 'date', 'services_sum_order_servicesprice', 'services_count']), function ($q) use ($sortField, $sortDirection) {
                return $q->orderBy($sortField, $sortDirection);
            })
            ->paginate(10);


        return view('admin.order.index', compact('orders'));
    }
}
