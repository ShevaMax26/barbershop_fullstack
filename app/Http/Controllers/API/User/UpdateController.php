<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
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
}
