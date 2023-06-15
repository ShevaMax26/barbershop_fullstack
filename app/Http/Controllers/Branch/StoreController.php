<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Http\Requests\Branch\StoreRequest;
use App\Models\Branch;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Branch::firstOrCreate($data);

        return redirect()->route('branch.index');
    }
}
