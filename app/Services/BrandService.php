<?php
// app/Services/BrandService.php

namespace App\Services;

use App\Models\Brand;

class BrandService
{
    public function getAll()
    {
        return Brand::all(); // Collection de Models
    }

    public function getById(int $id): ?Brand
    {
        return Brand::find($id);
    }

    public function addBrand(array $data): Brand
    {
        return Brand::create([
            'name' => $data['name'],
            'is_active' => true,
        ]);
    }

    public function updateBrand(int $id, string $name): ?Brand
    {
        $brand = Brand::find($id);
        if ($brand) {
            $brand->update(['name' => $name]);
        }
        return $brand;
    }

    public function deleteBrand(int $id): bool
    {
        $brand = Brand::find($id);
        return $brand ? $brand->delete() : false;
    }
}
