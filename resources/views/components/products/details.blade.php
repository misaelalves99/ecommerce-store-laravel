<!-- resources/views/products/details.blade.php -->

@props(['product'])

@push('styles')
    @vite('resources/css/components/products/product-details.css')
@endpush

<div class="card">
    <div class="cardBody">
        <h5 class="cardTitle">{{ $product->name }}</h5>

        <p class="cardText"><strong>Descrição:</strong> {{ $product->description }}</p>
        <p class="cardText"><strong>SKU:</strong> {{ $product->sku }}</p>
        <p class="cardText"><strong>Preço:</strong> {{ number_format($product->price, 2, ',', '.') }} R$</p>
        <p class="cardText"><strong>Estoque:</strong> {{ $product->stock }}</p>
        <p class="cardText"><strong>Categoria:</strong> {{ $product->category->name ?? '-' }}</p>
        <p class="cardText"><strong>Marca:</strong> {{ $product->brand->name ?? '-' }}</p>
        <p class="cardText"><strong>Status:</strong> {{ $product->isActive ? 'Ativo' : 'Inativo' }}</p>
    </div>
</div>
