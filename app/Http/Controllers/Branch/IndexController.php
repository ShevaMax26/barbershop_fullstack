<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $branches = Branch::all();

        return view('admin.branch.index', compact('branches'));
    }
}
