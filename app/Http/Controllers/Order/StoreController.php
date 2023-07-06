<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreRequest;
use App\Models\Order;
use App\Services\OrderManager;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    private $orderManager;

    public function __construct(OrderManager $orderManager)
    {
        $this->orderManager = $orderManager;
    }
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $this->orderManager->store($data);

        return redirect()->route('order.index');
    }
}
