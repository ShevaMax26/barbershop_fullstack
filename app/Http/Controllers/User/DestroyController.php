<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class DestroyController extends Controller
{
    public function __invoke(Role $role)
    {
        $role->delete();

        return redirect()->route('role.index');
    }
}
