<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreRequest;
use App\Models\Order;
use App\Services\OrderManager;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        app(OrderManager::class)->store($request->validated());

        return redirect()->route('order.index');
    }
}
