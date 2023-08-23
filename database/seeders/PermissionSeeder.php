<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::firstOrCreate(['name' => 'show orders']);
        Permission::firstOrCreate(['name' => 'create orders']);
        Permission::firstOrCreate(['name' => 'edit orders']);
        Permission::firstOrCreate(['name' => 'delete orders']);

        Permission::firstOrCreate(['name' => 'show employees']);
        Permission::firstOrCreate(['name' => 'create employees']);
        Permission::firstOrCreate(['name' => 'edit employees']);
        Permission::firstOrCreate(['name' => 'delete employees']);

        Permission::firstOrCreate(['name' => 'show branches']);
        Permission::firstOrCreate(['name' => 'create branches']);
        Permission::firstOrCreate(['name' => 'edit branches']);
        Permission::firstOrCreate(['name' => 'delete branches']);

        Permission::firstOrCreate(['name' => 'show services']);
        Permission::firstOrCreate(['name' => 'create services']);
        Permission::firstOrCreate(['name' => 'edit services']);
        Permission::firstOrCreate(['name' => 'delete services']);

        Permission::firstOrCreate(['name' => 'show service details']);
        Permission::firstOrCreate(['name' => 'create service details']);
        Permission::firstOrCreate(['name' => 'edit service details']);
        Permission::firstOrCreate(['name' => 'delete service details']);

        Permission::firstOrCreate(['name' => 'show ranks']);
        Permission::firstOrCreate(['name' => 'create ranks']);
        Permission::firstOrCreate(['name' => 'edit ranks']);
        Permission::firstOrCreate(['name' => 'delete ranks']);

        Permission::firstOrCreate(['name' => 'show roles']);
        Permission::firstOrCreate(['name' => 'create roles']);
        Permission::firstOrCreate(['name' => 'edit roles']);
        Permission::firstOrCreate(['name' => 'delete roles']);

        Permission::firstOrCreate(['name' => 'show users']);
        Permission::firstOrCreate(['name' => 'create users']);
        Permission::firstOrCreate(['name' => 'edit users']);
        Permission::firstOrCreate(['name' => 'delete users']);
    }
}
