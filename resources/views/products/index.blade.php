<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('title', 'Produtos')

@push('styles')
    @vite(['resources/css/products/index-page.css'])
@endpush

@section('content')
<div class="container">
    <div class="header">
        <h1 class="heading">Produtos</h1>
        <a href="{{ route('products.create') }}" class="btn btnPrimary">
            Adicionar Produto
        </a>
    </div>

    @if($products->isEmpty())
        <p>Nenhum produto cadastrado.</p>
    @else
        <table class="product-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>SKU</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->isActive ? 'Ativo' : 'Inativo' }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btnSecondary">Detalhes</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btnPrimary">Editar</a>
                        <a href="{{ route('products.delete', $product->id) }}" class="btn btnDanger">Excluir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
