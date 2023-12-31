<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Rank;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $ranks = Rank::all();
        $branches = Branch::all();

        return view('admin.employee.create', compact('ranks', 'branches'));
    }
}
