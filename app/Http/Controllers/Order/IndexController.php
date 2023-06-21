<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $orders = Order::with(['branch', 'barber'])->get();
        return view('admin.order.index', compact('orders'));
    }
}
