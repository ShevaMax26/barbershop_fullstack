<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BarberBranch\BarberBranchResource;
use App\Models\Branch;

class BarberBranchController extends Controller
{
    public function __invoke(Branch $branch)
    {
        $barbers = $branch->barbers()->with('rank')->orderByDesc('rank_id')->get();

        return BarberBranchResource::collection($barbers);
    }
}
