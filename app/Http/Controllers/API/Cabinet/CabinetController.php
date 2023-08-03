<?php

namespace App\Http\Controllers\API\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cabinet\CabinetResource;
use App\Models\User;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    public function __invoke()
    {
        $users = User::all();

        return CabinetResource::collection($users);
    }
}
