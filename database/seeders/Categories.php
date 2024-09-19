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
            'name' => 'home-post',
            'Label' => 'home',
            'content' => 'home posts',
            'order' => '0',
            'type' => 'posts',
        ]);
        Category::create([
            'name' => 'popular-post',
            'Label' => 'popular',
            'content' => 'popular posts',
            'order' => '0',
            'type' => 'posts',
        ]);
        Category::create([
            'name' => 'home-product',
            'Label' => 'home',
            'content' => 'home posts',
            'order' => '0',
            'type' => 'products',
        ]);
        Category::create([
            'name' => 'popular-product',
            'Label' => 'popular',
            'content' => 'popular posts',
            'order' => '0',
            'type' => 'products',
        ]);
    }
}
