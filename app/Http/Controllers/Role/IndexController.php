<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class IndexController extends Controller
{
    public function __invoke()
    {
        $roles = Role::where('name', '!=', 'super-admin')->orderBy('id')->get();

        return view('admin.role.index', compact('roles'));
    }
}
