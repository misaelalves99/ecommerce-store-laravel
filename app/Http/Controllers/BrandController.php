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

    public function index()
    {
        $brands = $this->brandService->getAll();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);

        $this->brandService->addBrand($request->only('name'));

        return redirect()->route('brands.index')->with('success', 'Marca adicionada com sucesso!');
    }

    public function edit(int $id)
    {
        $brand = $this->brandService->getAll()->find($id);
        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $this->brandService->updateBrand($id, $request->name);

        return redirect()->route('brands.index')->with('success', 'Marca atualizada com sucesso!');
    }

    public function destroy(int $id)
    {
        $this->brandService->deleteBrand($id);
        return redirect()->route('brands.index')->with('success', 'Marca removida com sucesso!');
    }
}
