<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; // Asegúrate de importar el modelo correcto

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Laptop HP',
                'description' => 'Laptop de 15 pulgadas',
                'price' => 1200.50,
                'category_id' => 1,
                'image' => null
            ],
            [
                'name' => 'Camiseta',
                'description' => 'Camiseta de algodón',
                'price' => 25.99,
                'category_id' => 2,
                'image' => null
            ],
        ];

        Product::insert($products); // ✅ Usando el modelo Product
    }
}