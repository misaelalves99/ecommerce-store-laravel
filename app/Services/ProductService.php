<?php
// app/Services/ProductService.php

namespace App\Services;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductService
{
    public function getAll()
    {
        return Product::with(['category', 'brand'])->get();
    }

    public function addProduct(array $data): Product
    {
        // Buscar categoria e marca pelo nome
        $category = Category::where('name', $data['categoryName'])->first();
        $brand = Brand::where('name', $data['brandName'])->first();

        return Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'sku' => $data['sku'],
            'price' => $data['price'],
            'stock' => $data['stock'],
            'is_active' => $data['isActive'],
            'category_id' => $category?->id ?? 0,
            'brand_id' => $brand?->id ?? 0,
        ]);
    }

    public function updateProduct(int $id, array $data): ?Product
    {
        $product = Product::find($id);
        if ($product) {
            $product->update($data);
        }
        return $product;
    }

    public function deleteProduct(int $id): bool
    {
        $product = Product::find($id);
        if ($product) {
            return $product->delete();
        }
        return false;
    }
}
