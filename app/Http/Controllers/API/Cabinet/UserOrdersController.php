<?php

namespace App\Http\Controllers\API\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cabinet\UserOrdersResource;

class UserOrdersController extends Controller
{
    public function getOrders()
    {
        $pendingOrders = auth('api')->user()->orders()->where('status', 1)->with('services')->get();
        $paidOrders = auth('api')->user()->orders()->where('status', 2)->with('services')->get();
        $canceledOrders = auth('api')->user()->orders()->where('status', 3)->with('services')->get();

        return [
            'pendingOrders' => UserOrdersResource::collection($pendingOrders),
            'paidOrders' => UserOrdersResource::collection($paidOrders),
            'canceledOrders' => UserOrdersResource::collection($canceledOrders),
        ];
    }
}
