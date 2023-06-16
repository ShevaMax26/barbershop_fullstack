<?php

namespace App\Http\Controllers\Barber;

use App\Http\Controllers\Controller;
use App\Models\Barber;

class IndexController extends Controller
{
    public function __invoke()
    {
        $barbers = Barber::with(['rank', 'branch'])->orderByDesc('rank_id')->get();

        return view('admin.barber.index', compact('barbers'));
    }
}
