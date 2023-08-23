<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\UpdateRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Employee $employee)
    {
        $data = $request->validated();
        $data['image'] = Storage::disk('public')->put('image', $data['image']);
        $employee->update($data);

        return redirect()->route('employee.show', compact('employee'));
    }
}
