<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Carbon\Carbon;

class ShowController extends Controller
{
    public function __invoke(Employee $employee)
    {
        $data = Carbon::parse($employee->created_at)->format('d.m.Y (1)');

        return view('admin.employee.show', compact('employee', 'data'));
    }
}
