<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Rank;
use function view;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('admin.main.index');
    }
}
