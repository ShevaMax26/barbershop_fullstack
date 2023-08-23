<?php

namespace Database\Seeders\RolePermission;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class ManagerPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manager = Role::create([
            'name' => 'manager',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $permissions = [
            'show orders',
            'create orders',
            'edit orders',
            'show employees',
            'show branches',
            'show services',
            'show service details',
            'show ranks',
            'show users',
            'create users',
            'edit users',
        ];

        array_map(function ($permission) use ($manager) {
            return $manager->givePermissionTo($permission);
        }, $permissions);
    }
}
