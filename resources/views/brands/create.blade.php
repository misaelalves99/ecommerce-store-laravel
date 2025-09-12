<!-- resources/views/brands/create.blade.php -->
 
@extends('layouts.app')

@section('title', 'Adicionar Produto')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/products/create-product-page.css') }}">
@endsection

@section('content')
<div class="container">
    <h1 class="pageTitle">Adicionar Marca</h1>

    <form action="{{ route('brands.store') }}" method="POST">
        @csrf

        <div class="formGroup">
            <label for="name" class="controlLabel">Nome da Marca</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                class="formControl @error('name') is-invalid @enderror"
                autofocus
            />
            @error('name')
                <span class="textDanger">{{ $message }}</span>
            @enderror
        </div>

        <div class="buttonGroup">
            <button type="submit" class="btn btnSuccess">Salvar</button>
            <a href="{{ route('brands.index') }}" class="btn btnSecondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
