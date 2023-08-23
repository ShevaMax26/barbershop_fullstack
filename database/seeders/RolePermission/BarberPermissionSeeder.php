<?php

namespace Database\Seeders\RolePermission;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class BarberPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barber = Role::create([
            'name' => 'barber',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $permissions = [
            'show orders',
            'show service details',
        ];

        array_map(function ($permission) use ($barber) {
            return $barber->givePermissionTo($permission);
        }, $permissions);
    }
}
