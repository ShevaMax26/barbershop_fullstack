<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::where('email', $data['email'])->first();

        if ($user) {
            return response()->json(['errors' => ['email' => ['Користувач з таким email уже існує']]], 403);
        }
        $user = User::create($data);

        $user->assignRole('user');

        $token = auth('api')->tokenById($user->id);

        return response(['access_token' => $token]);
    }
}
