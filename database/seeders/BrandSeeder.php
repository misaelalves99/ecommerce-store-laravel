<?php
// database/seeders/BrandSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        Brand::insert([
            ['id' => 1, 'name' => 'Nike', 'created_at' => '2024-01-10T10:00:00Z', 'is_active' => true],
            ['id' => 2, 'name' => 'Adidas', 'created_at' => '2024-02-15T14:30:00Z', 'is_active' => true],
            ['id' => 3, 'name' => 'Apple', 'created_at' => '2024-03-20T09:15:00Z', 'is_active' => true],
            ['id' => 4, 'name' => 'Samsung', 'created_at' => '2024-04-25T16:45:00Z', 'is_active' => true],
        ]);
    }
}
