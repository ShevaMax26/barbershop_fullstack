<?php

namespace App\Http\Controllers\Rank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.rank.create');
    }
}
