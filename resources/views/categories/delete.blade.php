<!-- resources/views/categories/delete.blade.php -->

@extends('layouts.app')

@push('styles')
    @vite(['resources/css/categories/delete-category-page.css'])
@endpush

@php
    $category = $category ?? null; // $category precisa ser passado pelo Controller
@endphp

@if (!$category)
    <div class="loading">Carregando...</div>
@else
    <div class="container">
        <h1 class="title">Excluir Categoria</h1>
        <p class="message">
            Tem certeza que deseja excluir a categoria <strong>{{ $category->name }}</strong>?
        </p>

        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="buttonGroup">
                <button type="submit" class="btn btnDanger" onclick="return confirm('Tem certeza que deseja excluir a categoria \'{{ $category->name }}\'?')">
                    Excluir
                </button>
                <a href="{{ route('categories.index') }}" class="btn btnSecondary">Cancelar</a>
            </div>
        </form>
    </div>
@endif
