<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Electrónicos'],
            ['name' => 'Ropa'],
            ['name' => 'Hogar'],
            ['name' => 'Alimentos'],
        ];

        Category::insert($categories);
    }
}