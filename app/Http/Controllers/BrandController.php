<?php
// app/Http/Controllers/BrandController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BrandService;

class BrandController extends Controller
{
    private BrandService $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    /**
     * Lista todas as marcas
     */
    public function index()
    {
        $brands = $this->brandService->getAll();
        return view('brands.index', compact('brands'));
    }

    /**
     * Formulário para criar nova marca
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Salva nova marca
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->brandService->addBrand($request->only('name'));

        return redirect()->route('brands.index')
                         ->with('success', 'Marca adicionada com sucesso!');
    }

    /**
     * Exibe detalhes de uma marca
     */
    public function show(int $id)
    {
        $brand = $this->brandService->getById($id);

        if (!$brand) {
            return redirect()->route('brands.index')
                             ->with('error', 'Marca não encontrada.');
        }

        return view('brands.details', compact('brand'));
    }

    /**
     * Formulário para editar uma marca
     */
    public function edit(int $id)
    {
        $brand = $this->brandService->getById($id);

        if (!$brand) {
            return redirect()->route('brands.index')
                             ->with('error', 'Marca não encontrada.');
        }

        return view('brands.edit', compact('brand'));
    }

    /**
     * Atualiza uma marca existente
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brand = $this->brandService->updateBrand($id, $request->name);

        if (!$brand) {
            return redirect()->route('brands.index')
                             ->with('error', 'Marca não encontrada.');
        }

        return redirect()->route('brands.index')
                         ->with('success', 'Marca atualizada com sucesso!');
    }

    /**
     * Deleta uma marca
     */
    public function destroy(int $id)
    {
        $deleted = $this->brandService->deleteBrand($id);

        if (!$deleted) {
            return redirect()->route('brands.index')
                             ->with('error', 'Marca não encontrada ou não pôde ser removida.');
        }

        return redirect()->route('brands.index')
                         ->with('success', 'Marca removida com sucesso!');
    }
}
