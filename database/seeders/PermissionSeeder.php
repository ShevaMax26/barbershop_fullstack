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
        Permission::create(['name' => 'Перегляд']);
        Permission::create(['name' => 'Створення']);
        Permission::create(['name' => 'Редагування']);
        Permission::create(['name' => 'Видалення']);
    }
}
