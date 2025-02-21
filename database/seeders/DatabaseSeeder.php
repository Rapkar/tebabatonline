<?php

namespace Database\Seeders;

use App\Http\Controllers\AdminController;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            Categories::class,
            AdminUserSeeder::class,

        ]);

        // Role::factory(10)->create();

        // Role::create([
        //     'name' => 'moderator',
        //     'description' => 'moderator level',
        // ]);
        
    }
}
