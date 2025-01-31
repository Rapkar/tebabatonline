<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
            'persian_name' => 'ادمین',
            'description' => 'admin level',
        ]);
        Role::create([
            'name' => 'owner',
            'persian_name' => 'نویسنده',
            'description' => 'owner level',
        ]);
        Role::create([
            'name' => 'Medic',
            'persian_name' => 'طبیب',
            'description' => 'Medic level',
        ]);
        Role::create([
            'name' => 'user',
            'persian_name' => 'مهمان',
            'description' => 'user level',
        ]);
    }
}
