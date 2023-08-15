<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ShowController extends Controller
{
    public function __invoke(Role $role)
    {
        return view('admin.role.show', compact('role'));
    }
}
