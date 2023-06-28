<?php

namespace App\Http\Controllers\API\ServiceDetail;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceDetail\ServiceDetailResource;
use App\Models\ServiceDetail;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $serviceDetail = ServiceDetail::all();

        return ServiceDetailResource::collection($serviceDetail);
    }
}
