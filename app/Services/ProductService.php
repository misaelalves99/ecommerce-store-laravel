<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getAll()
    {
        return Product::all();
    }

    public function addProduct(array $data): Product
    {
        // Criar produto usando IDs de categoria e marca diretamente
        return Product::create([
            'name' => $data['name'],
            'description' => $data['description'] ?? '',
            'sku' => $data['sku'] ?? null,
            'price' => $data['price'],
            'stock' => $data['stock'],
            'is_active' => $data['is_active'] ?? true, // pode ser opcional
            'category_id' => $data['category_id'],
            'brand_id' => $data['brand_id'],
        ]);
    }

    public function updateProduct(int $id, array $data)
    {
        $product = Product::find($id);
        if (!$product) return null;

        $product->update([
            'name' => $data['name'],
            'description' => $data['description'] ?? '',
            'sku' => $data['sku'] ?? null,
            'price' => $data['price'],
            'stock' => $data['stock'],
            'is_active' => $data['is_active'] ?? true,
            'category_id' => $data['category_id'],
            'brand_id' => $data['brand_id'],
        ]);

        return $product;
    }

    public function deleteProduct(int $id): bool
    {
        $product = Product::find($id);
        if (!$product) return false;

        return $product->delete();
    }
}
