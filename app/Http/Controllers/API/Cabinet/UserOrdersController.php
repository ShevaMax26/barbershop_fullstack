<?php

namespace App\Http\Controllers\API\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cabinet\UserOrdersResource;

class UserOrdersController extends Controller
{
    public function getOrders()
    {
        $orders = auth('api')->user()->orders()->with('services')->get();

        return UserOrdersResource::collection($orders);
    }
}
