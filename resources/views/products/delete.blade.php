<!-- resources/views/products/delete.blade.php -->

@extends('layouts.app')

@section('title', 'Excluir Produto')

@push('styles')
    @vite(['resources/css/products/delete-product-page.css'])
@endpush

@section('content')
<div class="container">
    @if(!$product)
        <div class="loading">Carregando...</div>
    @else
        <h1 class="title">Excluir Produto</h1>
        <p class="message">
            Tem certeza que deseja excluir o produto <strong>{{ $product->name }}</strong>?
        </p>

        <div class="buttonGroup">
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btnDanger" onclick="return confirm('Tem certeza que deseja excluir o produto \'{{ $product->name }}\'?')">
                    Excluir
                </button>
            </form>

            <a href="{{ route('products.index') }}" class="btn btnSecondary">Cancelar</a>
        </div>
    @endif
</div>
