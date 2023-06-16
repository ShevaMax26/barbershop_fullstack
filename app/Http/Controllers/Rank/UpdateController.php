<?php

namespace App\Http\Controllers\Rank;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rank\UpdateRequest;
use App\Models\Rank;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Rank $rank)
    {
        $data = $request->validated();
        $rank->update($data);

        return redirect()->route('rank.show', compact('rank'));
    }
}
