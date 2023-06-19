<?php

namespace App\Http\Controllers\ServiceDetail;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceDetail\StoreRequest;
use App\Models\BarberService;
use App\Models\Rank;
use App\Models\ServiceDetail;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $serviceDetails = ServiceDetail::orderBy('rank_id', 'asc')->get();;
        $ranks = Rank::all();
        return view('admin.service-detail.index', compact('serviceDetails', 'ranks'));
    }
}
