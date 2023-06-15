<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Branch $branch)
    {
        return view('admin.branch.show', compact('branch'));
    }
}
