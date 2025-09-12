@extends('layouts.app')

@section('title', 'Adicionar Produto')

@push('styles')
    @vite(['resources/css/products/create-product-page.css'])
@endpush

@section('content')
<div class="container">
    <h1 class="pageTitle">Adicionar Produto</h1>

    <form action="{{ route('products.store') }}" method="POST" class="formContainer">
        @csrf

        <label class="label" for="name">Nome do Produto</label>
        <input type="text" name="name" id="name" class="inputField" value="{{ old('name') }}" required>
        @error('name')
            <span class="errorText">{{ $message }}</span>
        @enderror

        <label class="label" for="description">Descrição</label>
        <textarea name="description" id="description" class="textareaField">{{ old('description') }}</textarea>
        @error('description')
            <span class="errorText">{{ $message }}</span>
        @enderror

        <label class="label" for="sku">SKU</label>
        <input type="text" name="sku" id="sku" class="inputField" value="{{ old('sku') }}">
        @error('sku')
            <span class="errorText">{{ $message }}</span>
        @enderror

        <label class="label" for="price">Preço</label>
        <input type="number" step="0.01" name="price" id="price" class="inputField" value="{{ old('price') }}">
        @error('price')
            <span class="errorText">{{ $message }}</span>
        @enderror

        <label class="label" for="stock">Estoque</label>
        <input type="number" name="stock" id="stock" class="inputField" value="{{ old('stock') }}">
        @error('stock')
            <span class="errorText">{{ $message }}</span>
        @enderror

        <label class="label" for="category">Categoria</label>
        <select name="category_id" id="category" class="selectField">
            <option value="">Selecione uma categoria</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <span class="errorText">{{ $message }}</span>
        @enderror

        <label class="label" for="brand">Marca</label>
        <select name="brand_id" id="brand" class="selectField">
            <option value="">Selecione uma marca</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                    {{ $brand->name }}
                </option>
            @endforeach
        </select>
        @error('brand_id')
            <span class="errorText">{{ $message }}</span>
        @enderror

        <label class="checkboxLabel">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
            Produto Ativo
        </label>
        @error('is_active')
            <span class="errorText">{{ $message }}</span>
        @enderror

        <div class="buttonGroup">
            <button type="submit" class="btnPrimary">Adicionar</button>
            <a href="{{ route('products.index') }}" class="btnSecondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
