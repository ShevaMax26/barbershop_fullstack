<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\Rank;

class EditController extends Controller
{
    public function __invoke(Employee $employee)
    {
        $ranks = Rank::all();
        $branches = Branch::all();
        return view('admin.employee.edit', compact('employee', 'ranks', 'branches'));
    }
}
