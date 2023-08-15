<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditController extends Controller
{
    public function __invoke(Role $role)
    {
        $role = Role::where('name', '!=', 'super-admin')->findOrFail($role->id);

        $permissions = Permission::all();

        return view('admin.role.edit', compact('role', 'permissions'));
    }
}
