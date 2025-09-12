<?php
// app/Services/CategoryService.php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getAll()
    {
        return Category::all();
    }

    public function addCategory(array $data): Category
    {
        return Category::create([
            'name' => $data['name'],
            'description' => $data['description'] ?? '',
            'created_at' => now()->toISOString(),
        ]);
    }

    public function updateCategory(int $id, array $data): ?Category
    {
        $category = Category::find($id);
        if ($category) {
            $category->update([
                'name' => $data['name'],
                'description' => $data['description'],
            ]);
        }
        return $category;
    }

    public function deleteCategory(int $id): bool
    {
        $category = Category::find($id);
        if ($category) {
            return $category->delete();
        }
        return false;
    }
}
