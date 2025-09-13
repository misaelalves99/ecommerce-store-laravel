<!-- resources/views/categories/create.blade.php -->

@extends('layouts.app')

@section('title', 'Adicionar Categoria')

@push('styles')
    @vite(['resources/css/categories/create-category-page.css'])
@endpush

@section('content')
<div class="container">
    <h1 class="pageTitle">Adicionar Categoria</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="formGroup">
            <label class="label" for="name">Nome</label>
            <input type="text" name="name" id="name" class="inputField" value="{{ old('name') }}" required>
            @error('name')
                <p class="errorText">{{ $message }}</p>
            @enderror
        </div>

        <div class="formGroup">
            <label class="label" for="description">Descrição</label>
            <textarea name="description" id="description" class="textareaField">{{ old('description') }}</textarea>
            @error('description')
                <p class="errorText">{{ $message }}</p>
            @enderror
        </div>

        <div class="buttonGroup">
            <button type="submit" class="btnPrimary">Salvar</button>
            <a href="{{ route('categories.index') }}" class="btnSecondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
