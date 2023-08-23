<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $role = Role::firstOrCreate([
            'name' => $data['name'],
        ]);

        $permissions = Permission::whereIn('id', $data['permissions'])->get();

        $role->syncPermissions($permissions);

        return redirect()->route('employee.role.index');
    }
}
