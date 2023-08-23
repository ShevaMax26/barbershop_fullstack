<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DestroyController extends Controller
{
    public function __invoke(User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}
