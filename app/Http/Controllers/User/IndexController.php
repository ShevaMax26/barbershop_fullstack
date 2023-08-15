<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = User::with('roles')->paginate(10);

        return view('admin.user.index', compact('users'));
    }
}
