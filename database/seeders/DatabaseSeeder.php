<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Database\Seeders\RolePermission\AdminPermissionSeeder;
use Database\Seeders\RolePermission\BarberPermissionSeeder;
use Database\Seeders\RolePermission\ManagerPermissionSeeder;
use Database\Seeders\RolePermission\RoleSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            BranchSeeder::class,
            RankSeeder::class,
            ServiceSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            AdminPermissionSeeder::class,
            ManagerPermissionSeeder::class,
            BarberPermissionSeeder::class,
            EmployeeSeeder::class,
            UserSeeder::class,
            SuperAdminSeeder::class,
        ]);

//        Employee::factory(5)->create();

        User::factory()->count(10)->create();
    }
}
