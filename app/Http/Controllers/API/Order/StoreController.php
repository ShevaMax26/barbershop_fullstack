<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Order\StoreRequest;
use App\Http\Resources\Order\OrderResource;
use App\Services\OrderManager;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        return new OrderResource(app(OrderManager::class)->store($request->validated()));
    }
}
