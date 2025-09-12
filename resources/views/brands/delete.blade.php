<!-- resources/views/brands/delete.blade.php -->

@extends('layouts.app')

@push('styles')
    @vite(['resources/css/brands/delete-brand-page.css'])
@endpush

@if(!$brand)
    <div class="loading">Carregando...</div>
@else
<div class="container">
    <h1 class="title">Excluir Marca</h1>
    <p class="message">
        Tem certeza que deseja excluir a marca <strong>{{ $brand->name }}</strong>?
    </p>

    <div class="buttonGroup">
        <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btnDanger" onclick="return confirm('Tem certeza que deseja excluir a marca &quot;{{ $brand->name }}&quot;?')">
                Excluir
            </button>
        </form>

        <a href="{{ route('brands.index') }}" class="btn btnSecondary">Cancelar</a>
    </div>
</div>
@endif
@endsection
