<?php

namespace Database\Seeders;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Employee::create([
            'name' => 'Admin',
            'surname' => 'Admin',
            'phone' => 111111111,
            'email' => 'super-admin@gmail.com',
            'password' => Hash::make('1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $superAdmin->assignRole('super-admin');
    }
}
