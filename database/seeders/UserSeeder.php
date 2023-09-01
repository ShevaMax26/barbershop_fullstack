<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Максим',
            'phone' => 674794891,
            'email' => 'user@gmail.com',
            'sex' => 1,
            'birth' => Carbon::now(),
            'password' => Hash::make('1234'),
        ]);
    }
}
