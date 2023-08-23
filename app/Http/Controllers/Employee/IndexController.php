<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class IndexController extends Controller
{
    public function __invoke()
    {
        $employees = Employee::with(['rank', 'branch'])->orderByDesc('rank_id')->get();

        return view('admin.employee.index', compact('employees'));
    }
}
