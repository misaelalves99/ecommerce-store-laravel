<!-- resources/views/categories/edit.blade.php -->

@extends('layouts.app')

@push('styles')
    @vite(['resources/css/categories/edit-category-page.css'])
@endpush

@section('content')
@php
    // A variável $category deve ser passada pelo Controller
@endphp

@if (!$category)
    <p class="loading">Carregando categoria...</p>
@else
    <div class="pageContainer">
        <h1 class="heading">Editar Categoria</h1>

        <form action="{{ route('categories.update', $category->id) }}" method="POST" class="formContainer">
            @csrf
            @method('PUT')

            <!-- Nome -->
            <label class="label" for="name">Nome</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="inputField">
            @error('name')
                <p class="errorText">{{ $message }}</p>
            @enderror

            <!-- Descrição -->
            <label class="label" for="description">Descrição</label>
            <textarea name="description" id="description" class="textareaField">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <p class="errorText">{{ $message }}</p>
            @enderror

            <!-- Botões -->
            <div class="buttonGroup">
                <button type="submit" class="btnPrimary">Salvar</button>
                <a href="{{ route('categories.index') }}" class="btnSecondary">Cancelar</a>
            </div>
        </form>
    </div>
@endif
