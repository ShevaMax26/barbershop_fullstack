<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\UpdateRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Role $role)
    {
        $data = $request->validated();

        $role = Role::where('name', '!=', 'super-admin')->findOrFail($role->id);

        $role->update([
            'name' => $data['name'],
        ]);

        if (isset($data['permissions'])) {
            $permissions = Permission::whereIn('id', $data['permissions'])->get();
            $role->syncPermissions($permissions);
        } else {
            $role->syncPermissions([]);
        }

        return redirect()->route('employee.role.show', compact('role'));
    }
}
