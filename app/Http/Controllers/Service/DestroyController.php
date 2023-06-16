<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;

class DestroyController extends Controller
{
    public function __invoke(Service $service)
    {
        $service->delete();

        return redirect()->route('service.index');
    }
}
