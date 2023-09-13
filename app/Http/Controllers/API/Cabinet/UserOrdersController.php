<?php

namespace App\Http\Controllers\API\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cabinet\UserOrdersResource;

class UserOrdersController extends Controller
{
    public function getOrders()
    {
        $user = auth('api')->user();

        $orders = $user->orders()
            ->whereIn('status', [1, 2, 3])
            ->with('services', 'employee.rank')
            ->get();

        $pendingOrders = $orders->where('status', 1);
        $paidOrders = $orders->where('status', 2);
        $canceledOrders = $orders->where('status', 3);

        return [
            'pendingOrders' => UserOrdersResource::collection($pendingOrders),
            'paidOrders' => UserOrdersResource::collection($paidOrders),
            'canceledOrders' => UserOrdersResource::collection($canceledOrders),
        ];
    }
}
