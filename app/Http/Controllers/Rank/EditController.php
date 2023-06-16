<?php

namespace App\Http\Controllers\Rank;

use App\Http\Controllers\Controller;
use App\Models\Rank;

class EditController extends Controller
{
    public function __invoke(Rank $rank)
    {
        return view('admin.rank.edit', compact('rank'));
    }
}
