<?php

namespace App\Http\Controllers\ServiceDetail;

use App\Http\Controllers\Controller;
use App\Models\Rank;
use App\Models\Service;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(Rank $rank)
    {
//        $services = Service::all();

        $services = Service::whereDoesntHave('serviceDetails', function ($query) use ($rank) {
            $query->where('rank_id', $rank->id);
        })->get();

        return view('admin.service-detail.create', compact('rank', 'services'));
    }
}
