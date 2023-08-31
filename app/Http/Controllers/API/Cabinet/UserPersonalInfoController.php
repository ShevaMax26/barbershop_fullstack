<?php

namespace App\Http\Controllers\API\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cabinet\UserPersonalInfoResource;

class UserPersonalInfoController extends Controller
{
    public function getPersonalInfo()
    {
        $user = auth('api')->user();

        return new UserPersonalInfoResource($user);
    }
}
