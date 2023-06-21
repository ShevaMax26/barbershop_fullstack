<?php

namespace App\Http\Controllers\ServiceDetail;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceDetail\StoreRequest;
use App\Models\Service;
use App\Models\ServiceDetail;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        ServiceDetail::firstOrCreate($data);

        return redirect()->route('service-detail.index');
    }
}
