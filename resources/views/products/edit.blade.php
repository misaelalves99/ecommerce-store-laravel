<!-- resources/views/products/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Editar Produto')

@push('styles')
    @vite(['resources/css/products/edit-product-page.css'])
@endpush

@section('content')
@if(!$product)
    <p class="loading">Carregando produto...</p>
@else
    <div class="pageContainer">
        <h1 class="heading">Editar Produto</h1>

        <form action="{{ route('products.update', $product->id) }}" method="POST" class="formContainer">
            @csrf
            @method('PUT')

            <label class="label" for="name">Nome</label>
            <input type="text" id="name" name="name" class="inputField" value="{{ old('name', $product->name) }}">
            @error('name') <span class="errorText">{{ $message }}</span> @enderror

            <label class="label" for="description">Descrição</label>
            <textarea id="description" name="description" class="textareaField">{{ old('description', $product->description) }}</textarea>
            @error('description') <span class="errorText">{{ $message }}</span> @enderror

            <label class="label" for="sku">SKU</label>
            <input type="text" id="sku" name="sku" class="inputField" value="{{ old('sku', $product->sku) }}">
            @error('sku') <span class="errorText">{{ $message }}</span> @enderror

            <label class="label" for="price">Preço</label>
            <input type="number" step="0.01" id="price" name="price" class="inputField" value="{{ old('price', $product->price) }}">
            @error('price') <span class="errorText">{{ $message }}</span> @enderror

            <label class="label" for="stock">Estoque</label>
            <input type="number" id="stock" name="stock" class="inputField" value="{{ old('stock', $product->stock) }}">
            @error('stock') <span class="errorText">{{ $message }}</span> @enderror

            <label class="label" for="isActive">Status</label>
            <select id="isActive" name="isActive" class="selectField">
                <option value="1" {{ old('isActive', $product->isActive) ? 'selected' : '' }}>Ativo</option>
                <option value="0" {{ !old('isActive', $product->isActive) ? 'selected' : '' }}>Inativo</option>
            </select>
            @error('isActive') <span class="errorText">{{ $message }}</span> @enderror

            <label class="label" for="category">Categoria</label>
            <select id="category" name="categoryId" class="selectField">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('categoryId', $product->categoryId) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('categoryId') <span class="errorText">{{ $message }}</span> @enderror

            <label class="label" for="brand">Marca</label>
            <select id="brand" name="brandId" class="selectField">
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ old('brandId', $product->brandId) == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
            @error('brandId') <span class="errorText">{{ $message }}</span> @enderror

            <div class="actions">
                <button type="submit" class="btnPrimary">Salvar</button>
                <a href="{{ route('products.index') }}" class="btnSecondary">Cancelar</a>
            </div>
        </form>
    </div>
@endif
@endsection
