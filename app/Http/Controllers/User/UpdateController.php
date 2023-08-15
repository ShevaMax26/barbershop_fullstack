<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();

        $user->update([
            'name' => $data['name'],
        ]);

        $role = Role::find($data['role_id']);

        $user->syncRoles([$role->name]);

        return redirect()->route('user.show', compact('user'));
    }
}
