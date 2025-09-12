<!-- resources/views/brands/details.blade.php -->

@extends('layouts.app')

@push('styles')
    @vite(['resources/css/brands/details-brand-page.css'])
@endpush

@section('content')
@if(!$brand)
    <p class="loading">Carregando detalhes da marca...</p>
@else
<div class="pageContainer">
    <h1 class="title">Detalhes da Marca</h1>

    <div class="detailsContainer">
        <div class="detailItem">
            <strong>ID:</strong> {{ $brand->id }}
        </div>
        <div class="detailItem">
            <strong>Nome:</strong> {{ $brand->name }}
        </div>
        <div class="detailItem">
            <strong>Status:</strong> {{ $brand->is_active ? 'Ativo' : 'Inativo' }}
        </div>
        <div class="detailItem">
            <strong>Criado em:</strong> {{ $brand->created_at->format('d/m/Y') }}
        </div>
        <div class="detailItem">
            <strong>Atualizado em:</strong> {{ $brand->updated_at->format('d/m/Y') }}
        </div>
    </div>

    <div class="actions">
        <a href="{{ route('brands.index') }}" class="btn btn-secondary">Voltar</a>
        <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-warning">Editar</a>
    </div>
</div>
@endif
@endsection
