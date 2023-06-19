<?php

namespace App\Http\Controllers\ServiceDetail;

use App\Http\Controllers\Controller;
use App\Models\ServiceDetail;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(ServiceDetail $serviceDetail)
    {
        $serviceDetail->delete();

        return redirect()->route('service-detail.index');
    }
}
