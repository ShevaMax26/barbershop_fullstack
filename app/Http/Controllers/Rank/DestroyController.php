<?php

namespace App\Http\Controllers\Rank;

use App\Http\Controllers\Controller;
use App\Models\Rank;

class DestroyController extends Controller
{
    public function __invoke(Rank $rank)
    {
        $rank->delete();

        return redirect()->route('rank.index');
    }
}
