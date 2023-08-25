<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $employees = [
            [
                'name' => 'Євген',
                'surname' => 'Федорук',
                'phone' => 111111111,
                'email' => 'barber@gmail.com',
                'password' => Hash::make('1234'),
                'rank_id' => 4,
                'branch_id' => 1,
            ],
            [
                'name' => 'Артем',
                'surname' => 'Гриценко',
                'phone' => 222222222,
                'email' => 'artem@gmail.com',
                'password' => Hash::make('1234'),
                'rank_id' => 4,
                'branch_id' => 2,
            ],
            [
                'name' => 'Микола',
                'surname' => 'Давінчі',
                'phone' => 333333,
                'email' => 'mykola@gmail.com',
                'password' => Hash::make('1234'),
                'rank_id' => 4,
                'branch_id' => 1,
            ],
            [
                'name' => 'Ірина',
                'surname' => 'Люк\'яєнко',
                'phone' => 333333,
                'email' => 'manager@gmail.com',
                'password' => Hash::make('1234'),
                'branch_id' => 1,
            ],
            [
                'name' => 'Вадим',
                'surname' => 'Ріжко',
                'phone' => 333333,
                'email' => 'admin@gmail.com',
                'password' => Hash::make('1234'),
                'branch_id' => 1,
            ],
        ];

        foreach ($employees as $employee) {
            $employeeCreated = Employee::firstOrCreate($employee);
            $employeeCreated->assignRole('barber');
        }
    }
}
