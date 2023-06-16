<?php

namespace App\Http\Controllers\Barber;

use App\Http\Controllers\Controller;
use App\Models\Barber;
use Carbon\Carbon;

class ShowController extends Controller
{
    public function __invoke(Barber $barber)
    {
        $data = Carbon::parse($barber->created_at)->format('d.m.Y (1)');

        return view('admin.barber.show', compact('barber', 'data'));
    }
}
