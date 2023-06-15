<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Http\Requests\Branch\UpdateRequest;
use App\Models\Branch;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Branch $branch)
    {
        $data = $request->validated();
        $branch->update($data);

        return redirect()->route('branch.show', compact('branch'));
    }
}
