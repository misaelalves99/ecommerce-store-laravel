<?php
// database/seeders/ProductSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'id' => 1,
                'name' => 'Notebook Gamer',
                'description' => 'Notebook potente para jogos',
                'sku' => 'NB-001',
                'price' => 5999.90,
                'stock' => 10,
                'category_id' => 1,
                'brand_id' => 1,
                'is_active' => true,
            ],
            [
                'id' => 2,
                'name' => 'Camiseta Esportiva',
                'description' => 'Camiseta confortável para esportes',
                'sku' => 'CM-002',
                'price' => 99.90,
                'stock' => 50,
                'category_id' => 2,
                'brand_id' => 2,
                'is_active' => true,
            ],
            [
                'id' => 3,
                'name' => 'Livro de Programação',
                'description' => 'Livro para aprender programação em JS',
                'sku' => 'LB-003',
                'price' => 59.90,
                'stock' => 100,
                'category_id' => 3,
                'brand_id' => 3,
                'is_active' => false,
            ],
        ]);
    }
}
