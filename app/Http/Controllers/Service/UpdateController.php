<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\UpdateRequest;
use App\Models\Service;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Service $service)
    {
        $data = $request->validated();
        $service->update($data);

        return redirect()->route('service.show', compact('service'));
    }
}
