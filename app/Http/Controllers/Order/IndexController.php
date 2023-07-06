<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $sort = $request->input('sort', 'default');

        $orders = Order::with(['branch', 'barber'])
            ->when($sort === 'date', function ($query) {
                return $query->orderBy('date');
            })
            ->when($sort === 'id', function ($query) {
                return $query->orderBy('id');
            })
            ->paginate(10);

        return view('admin.order.index', compact('orders'));
    }
}
