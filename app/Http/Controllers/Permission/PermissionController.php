<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function getPermissions(Request $request)
    {
        $data = Permission::where('name', 'like', '%' . $request->searchItem . '%');

        return $data->paginate(10, ['*'], 'page', $request->page);
    }
}
