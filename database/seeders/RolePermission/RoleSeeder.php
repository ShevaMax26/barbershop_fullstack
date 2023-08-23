<?php

namespace Database\Seeders\RolePermission;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'super-admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Role::create([
            'name' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
