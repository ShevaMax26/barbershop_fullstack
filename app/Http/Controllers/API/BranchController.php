<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Branch\BranchResource;
use App\Models\Branch;

class BranchController extends Controller
{
    public function __invoke()
    {
        $branches = Branch::all();

        return BranchResource::collection($branches);
    }
}
