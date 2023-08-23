<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['image'] = Storage::disk('public')->put('images', $data['image']);

        Employee::firstOrCreate([
            'phone' => $data['phone'],
        ], $data);

        return redirect()->route('employee.index');
    }
}
