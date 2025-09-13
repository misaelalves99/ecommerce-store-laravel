<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    // Listar todos os produtos
    public function index()
    {
        $products = $this->productService->getAll();
        return view('products.index', compact('products'));
    }

    // Formulário para criar produto
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.create', compact('categories', 'brands'));
    }

    // Salvar novo produto
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sku' => 'nullable|string|max:100',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $this->productService->addProduct($request->only([
            'name', 'description', 'sku', 'price', 'stock', 'category_id', 'brand_id'
        ]));

        return redirect()->route('products.index')
                         ->with('success', 'Produto criado com sucesso!');
    }

    // Formulário de edição
    public function edit(int $id)
    {
        $product = $this->productService->getAll()->find($id);
        if (!$product) {
            return redirect()->route('products.index')
                             ->with('error', 'Produto não encontrado.');
        }

        $categories = Category::all();
        $brands = Brand::all();
        return view('products.edit', compact('product', 'categories', 'brands'));
    }

    // Atualizar produto
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sku' => 'nullable|string|max:100',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $this->productService->updateProduct($id, $request->only([
            'name', 'description', 'sku', 'price', 'stock', 'category_id', 'brand_id'
        ]));

        return redirect()->route('products.index')
                         ->with('success', 'Produto atualizado com sucesso!');
    }

    // Excluir produto
    public function destroy(int $id)
    {
        $this->productService->deleteProduct($id);
        return redirect()->route('products.index')
                         ->with('success', 'Produto excluído com sucesso!');
    }

    // Detalhes do produto
    public function show(int $id)
    {
        $product = $this->productService->getAll()->find($id);
        if (!$product) {
            return redirect()->route('products.index')
                            ->with('error', 'Produto não encontrado.');
        }

        // Corrigido de 'products.show' para 'products.details'
        return view('products.details', compact('product'));
    }
}
