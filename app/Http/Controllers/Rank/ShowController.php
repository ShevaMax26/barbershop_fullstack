<?php

namespace App\Http\Controllers\Rank;

use App\Http\Controllers\Controller;
use App\Models\Rank;

class ShowController extends Controller
{
    public function __invoke(Rank $rank)
    {
        return view('admin.rank.show', compact('rank'));
    }
}
