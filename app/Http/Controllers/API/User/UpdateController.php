<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdatePasswordRequest;
use App\Http\Requests\User\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function updatePersonalInfo(UpdateRequest $request)
    {
        $data = $request->validated();

        $user = auth('api')->user();

        $user->update([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
        ]);

        return response()->json(['message' => 'Дані користувача оновлені успішно']);
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $data = $request->validated();

        $user = auth('api')->user();

        if (Hash::check($data['old_password'], $user->password)) {
            auth('api')->logout();

            $user->update([
                'password' => Hash::make($data['new_password']),
            ]);

            $token = auth('api')->login($user);

            return response()->json(['message' => 'Пароль оновлено успішно', 'access_token' => $token]);
        } else {
            return response()->json(['errors' => ['message' => ['Старий пароль невірний']]], 422);
        }
    }

}
