<!-- resources/views/categories/category-details.blade.php -->

@props(['category'])

@push('styles')
    @vite('resources/css/components/categories/category-details.css')
@endpush

<div class="card">
    <div class="cardBody">
        <h5 class="cardTitle">{{ $category->name }}</h5>
        <p class="cardText"><strong>ID:</strong> {{ $category->id }}</p>
        <p class="cardText"><strong>Nome:</strong> {{ $category->name }}</p>
        <p class="cardText"><strong>Descrição:</strong> {{ $category->description }}</p>
    </div>
</div>
