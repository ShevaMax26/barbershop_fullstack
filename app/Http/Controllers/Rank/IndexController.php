<?php

namespace App\Http\Controllers\Rank;

use App\Http\Controllers\Controller;
use App\Models\Rank;

class IndexController extends Controller
{
    public function __invoke()
    {
        $ranks = Rank::all();

        return view('admin.rank.index', compact('ranks'));
    }
}
