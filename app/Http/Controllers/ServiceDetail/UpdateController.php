<?php

namespace App\Http\Controllers\ServiceDetail;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceDetail\UpdateRequest;
use App\Models\ServiceDetail;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, ServiceDetail $serviceDetail)
    {
        $data = $request->validated();
        $serviceDetail->update($data);

        return redirect()->route('service-detail.index');
    }
}
