<!-- resources/views/products/details.blade.php -->

@extends('layouts.app')

@section('title', 'Detalhes do Produto')

@push('styles')
    @vite(['resources/css/products/details-product-page.css'])
@endpush

@section('content')
@if(!$product)
    <div class="notFound">
        Produto não encontrado.
        <a href="{{ route('products.index') }}" class="btnPrimary">Voltar</a>
    </div>
@else
    <div class="container">
        <h1 class="title">Detalhes do Produto</h1>

        <div class="detailsContainer">
            <p><strong>Nome:</strong> {{ $product->name }}</p>
            <p><strong>Descrição:</strong> {{ $product->description }}</p>
            <p><strong>SKU:</strong> {{ $product->sku }}</p>
            <p><strong>Preço:</strong> R$ {{ number_format($product->price, 2, ',', '.') }}</p>
            <p><strong>Estoque:</strong> {{ $product->stock }}</p>
            <p><strong>Status:</strong> {{ $product->isActive ? 'Ativo' : 'Inativo' }}</p>
            <p><strong>Categoria:</strong> {{ $product->categoryName }}</p>
            <p><strong>Marca:</strong> {{ $product->brandName }}</p>
        </div>

        <div class="actions">
            <a href="{{ route('products.index') }}" class="btnPrimary">Voltar</a>
            <a href="{{ route('products.edit', $product->id) }}" class="btnSecondary">Editar</a>
        </div>
    </div>
@endif
@endsection
