<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class CreateController extends Controller
{
    public function __invoke()
    {
        $permissions = Permission::all();

        return view('admin.role.create', compact('permissions'));
    }
}
