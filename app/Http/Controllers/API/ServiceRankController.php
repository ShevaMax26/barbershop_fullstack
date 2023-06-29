<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Branch\BranchResource;
use App\Http\Resources\ServiceRank\ServiceRankResource;
use App\Models\Branch;
use App\Models\Rank;

class ServiceRankController extends Controller
{
    public function __invoke(Rank $rank)
    {
        $services = $rank->serviceDetails()->with('service')->orderBy('service_id', 'asc')->get();

        return ServiceRankResource::collection($services);
    }
}
