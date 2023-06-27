<?php

namespace App\Http\Controllers\API\Rank;

use App\Http\Controllers\Controller;
use App\Http\Resources\RankServiceDetail\RankServiceDetailResource;
use App\Models\Rank;
use Illuminate\Http\Request;

class RankServiceController extends Controller
{
    public function __invoke()
    {
        $ranks = Rank::with(['serviceDetails.service'])->get();

        return RankServiceDetailResource::collection($ranks);
    }
}
