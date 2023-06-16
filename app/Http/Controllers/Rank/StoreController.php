<?php

namespace App\Http\Controllers\Rank;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rank\StoreRequest;
use App\Models\Rank;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Rank::firstOrCreate($data);

        return redirect()->route('rank.index');
    }
}
