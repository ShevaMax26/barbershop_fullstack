<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Branch $branch)
    {
        $branch->delete();

        return redirect()->route('branch.index');
    }
}
