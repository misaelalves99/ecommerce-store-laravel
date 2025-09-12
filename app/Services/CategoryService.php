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

    public function getById(int $id): ?Category
    {
        return Category::find($id);
    }

    public function addCategory(array $data): Category
    {
        // Eloquent já gerencia created_at e updated_at automaticamente
        return Category::create([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
        ]);
    }

    public function updateCategory(int $id, array $data): ?Category
    {
        $category = Category::find($id);

        if ($category) {
            $category->update([
                'name' => $data['name'],
                'description' => $data['description'] ?? null,
            ]);
        }

        return $category;
    }

    public function deleteCategory(int $id): bool
    {
        $category = Category::find($id);

        if ($category) {
            return (bool) $category->delete();
        }

        return false;
    }
}
