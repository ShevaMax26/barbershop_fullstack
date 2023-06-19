<?php

namespace App\Http\Controllers\ServiceDetail;

use App\Http\Controllers\Controller;
use App\Models\ServiceDetail;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(ServiceDetail $serviceDetail)
    {
        return view('admin.service-detail.edit', compact('serviceDetail'));
    }
}
