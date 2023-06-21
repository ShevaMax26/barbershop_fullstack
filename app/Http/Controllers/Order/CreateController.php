<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Barber;
use App\Models\Branch;
use App\Models\Service;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $branches = Branch::all();
        $barbers = Barber::all();
        $services = Service::all();
        return view('admin.order.create', compact('branches', 'barbers', 'services'));
    }
}
