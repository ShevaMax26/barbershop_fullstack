<?php

namespace App\Http\Controllers\Barber;

use App\Http\Controllers\Controller;
use App\Models\Barber;

class DestroyController extends Controller
{
    public function __invoke(Barber $barber)
    {
        $barber->delete();

        return redirect()->route('barber.index');
    }
}
