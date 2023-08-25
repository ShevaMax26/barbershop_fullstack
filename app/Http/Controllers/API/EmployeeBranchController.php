<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Barber\BarberBranchResource;
use App\Models\Branch;

class EmployeeBranchController extends Controller
{
    public function __invoke(Branch $branch)
    {
        $barbers = $branch->employees()
            ->whereHas('roles', function ($query) {
                $query->where('name', 'barber');
            })
            ->with('rank')
            ->orderByDesc('rank_id')
            ->get();

        return BarberBranchResource::collection($barbers);
    }
}
