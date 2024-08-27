<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'home',
            'content' => 'home posts',
            'order' => '0',
        ]);
        Category::create([
            'name' => 'popular',
            'content' => 'popular posts',
            'order' => '0',
        ]);

    }
}
