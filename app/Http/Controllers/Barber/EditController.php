<?php

namespace App\Http\Controllers\Barber;

use App\Http\Controllers\Controller;
use App\Models\Barber;
use App\Models\Branch;
use App\Models\Rank;

class EditController extends Controller
{
    public function __invoke(Barber $barber)
    {
        $ranks = Rank::all();
        $branches = Branch::all();
        return view('admin.barber.edit', compact('barber', 'ranks', 'branches'));
    }
}
