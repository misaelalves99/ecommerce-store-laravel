<?php
// database/seeders/CategorySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            [
                'id' => 1,
                'name' => 'Eletrônicos',
                'description' => 'Produtos eletrônicos variados',
                'created_at' => '2023-01-10T10:00:00Z',
            ],
            [
                'id' => 2,
                'name' => 'Moda',
                'description' => 'Roupas e acessórios de moda',
                'created_at' => '2023-02-05T15:30:00Z',
            ],
            [
                'id' => 3,
                'name' => 'Casa e Decoração',
                'description' => 'Produtos para casa e decoração',
                'created_at' => '2023-03-01T12:45:00Z',
            ],
            [
                'id' => 4,
                'name' => 'Esportes',
                'description' => 'Equipamentos e acessórios esportivos',
                'created_at' => '2023-03-20T09:20:00Z',
            ],
        ]);
    }
}
