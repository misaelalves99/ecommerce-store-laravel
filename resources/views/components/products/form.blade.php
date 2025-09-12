<!-- resources/views/products/form.blade.php -->

@props([
    'product' => null,
    'categories' => [],
    'brands' => [],
    'action' => '',
    'method' => 'POST',
    'submitLabel' => 'Salvar'
])

@push('styles')
    @vite('resources/css/components/products/product-form.css')
@endpush

<form action="{{ $action }}" method="POST" class="form" novalidate>
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif

    <input type="hidden" name="id" value="{{ $product->id ?? '' }}">

    <div class="formGroup">
        <label for="name" class="controlLabel">Nome</label>
        <input id="name" name="name" type="text" class="formControl" value="{{ old('name', $product->name ?? '') }}">
        @error('name')<span class="textDanger">{{ $message }}</span>@enderror
    </div>

    <div class="formGroup">
        <label for="description" class="controlLabel">Descrição</label>
        <textarea id="description" name="description" class="formControl">{{ old('description', $product->description ?? '') }}</textarea>
        @error('description')<span class="textDanger">{{ $message }}</span>@enderror
    </div>

    <div class="formGroup">
        <label for="sku" class="controlLabel">SKU</label>
        <input id="sku" name="sku" type="text" class="formControl" value="{{ old('sku', $product->sku ?? '') }}">
        @error('sku')<span class="textDanger">{{ $message }}</span>@enderror
    </div>

    <div class="formGroup">
        <label for="price" class="controlLabel">Preço</label>
        <input id="price" name="price" type="number" step="0.01" class="formControl" value="{{ old('price', $product->price ?? 0) }}">
        @error('price')<span class="textDanger">{{ $message }}</span>@enderror
    </div>

    <div class="formGroup">
        <label for="stock" class="controlLabel">Estoque</label>
        <input id="stock" name="stock" type="number" class="formControl" value="{{ old('stock', $product->stock ?? 0) }}">
        @error('stock')<span class="textDanger">{{ $message }}</span>@enderror
    </div>

    <div class="formGroup">
        <label for="category_id" class="controlLabel">Categoria</label>
        <select id="category_id" name="category_id" class="formControl">
            <option value="">-- Selecione --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" @selected(old('category_id', $product->category_id ?? '') == $cat->id)>{{ $cat->name }}</option>
            @endforeach
        </select>
        @error('category_id')<span class="textDanger">{{ $message }}</span>@enderror
    </div>

    <div class="formGroup">
        <label for="brand_id" class="controlLabel">Marca</label>
        <select id="brand_id" name="brand_id" class="formControl">
            <option value="">-- Selecione --</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}" @selected(old('brand_id', $product->brand_id ?? '') == $brand->id)>{{ $brand->name }}</option>
            @endforeach
        </select>
        @error('brand_id')<span class="textDanger">{{ $message }}</span>@enderror
    </div>

    <div class="formCheck">
        <input id="isActive" name="isActive" type="checkbox" class="formCheckInput" value="1"
               @checked(old('isActive', $product->isActive ?? true))>
        <label for="isActive" class="formCheckLabel">Ativo</label>
    </div>

    <button type="submit" class="btn btnSuccess">{{ $submitLabel }}</button>
    <a href="{{ url()->previous() }}" class="btn btnSecondary">Cancelar</a>
</form>
