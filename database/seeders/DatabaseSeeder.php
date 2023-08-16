<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Barber;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            BranchSeeder::class,
            RankSeeder::class,
            ServiceSeeder::class,
            BarberSeeder::class,
            RoleSeeder::class,
            SuperAdminSeeder::class,
            PermissionSeeder::class,
        ]);

        Barber::factory(5)->create();

        User::factory()->count(10)->create()->each(function ($user) {
            $user->assignRole('user');
        });
    }
}
