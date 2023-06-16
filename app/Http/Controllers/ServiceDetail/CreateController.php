<?php

namespace App\Http\Controllers\ServiceDetail;

use App\Http\Controllers\Controller;
use App\Models\Rank;
use App\Models\Service;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $ranks = Rank::all();
        $services = Service::all();

        return view('admin.service-detail.create', compact('ranks', 'services'));
    }
}
