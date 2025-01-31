<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::create([
            'name' => 'admin',
            'email' => 'hosseinbidar7@gmail.com',
            'password' => Hash::make("0311121314"),
        ]);
        $adminRole = Role::where('name', 'admin')->first();

        // Attach the role to the user
        if ($adminRole) {
            $adminUser->roles()->attach($adminRole->id);
        }
    }
}
