<?php
// app/Services/BrandService.php

namespace App\Services;

use App\Models\Brand;

class BrandService
{
    /**
     * Retorna todas as marcas.
     */
    public function getAll()
    {
        return Brand::all();
    }

    /**
     * Cria uma nova marca.
     */
    public function addBrand(array $data): Brand
    {
        return Brand::create([
            'name' => $data['name'],
            'is_active' => true, // Ativo por padrão
        ]);
        // NOTA: created_at e updated_at são preenchidos automaticamente
    }

    /**
     * Atualiza uma marca existente.
     */
    public function updateBrand(int $id, string $name): ?Brand
    {
        $brand = Brand::find($id);
        if ($brand) {
            $brand->update(['name' => $name]);
        }
        return $brand;
    }

    /**
     * Deleta uma marca.
     */
    public function deleteBrand(int $id): bool
    {
        $brand = Brand::find($id);
        if ($brand) {
            return $brand->delete();
        }
        return false;
    }
}
