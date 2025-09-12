<!-- resources/views/components/brand/brand-details.blade.php -->

@props(['brand'])

@push('styles')
    @vite('resources/css/components/brands/brand-details.css')
@endpush

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $brand->name }}</h5>
        <p class="card-text"><strong>ID:</strong> {{ $brand->id }}</p>
        <p class="card-text">
            <strong>Status:</strong> {{ $brand->isActive ? 'Ativo' : 'Inativo' }}
        </p>
    </div>
</div>
