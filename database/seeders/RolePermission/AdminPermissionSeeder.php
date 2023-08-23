<?php

namespace Database\Seeders\RolePermission;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $permissions = [
            'show orders',
            'create orders',
            'edit orders',
            'show employees',
            'create employees',
            'edit employees',
            'show branches',
            'create branches',
            'edit branches',
            'show services',
            'create services',
            'edit services',
            'show service details',
            'create service details',
            'edit service details',
            'show ranks',
            'create ranks',
            'edit ranks',
            'show roles',
            'create roles',
            'edit roles',
            'show users',
            'create users',
            'edit users',
        ];

        array_map(function ($permission) use ($admin) {
            return $admin->givePermissionTo($permission);
        }, $permissions);
    }
}
