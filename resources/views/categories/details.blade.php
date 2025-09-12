<!-- resources/views/categories/details.blade.php -->

@extends('layouts.app')

@push('styles')
    @vite(['resources/css/categories/details-category-page.css'])
@endpush

@section('content')
@php
    $category = $category ?? null; // Deve ser passado pelo Controller
@endphp

@if (!$category)
    <p class="loading">Carregando detalhes da categoria...</p>
@else
    <div class="pageContainer">
        <h1 class="title">Detalhes da Categoria</h1>

        <div class="detailsContainer">
            <h2>Informações</h2>
            <div class="detailItem">
                <span>Nome:</span>
                <strong>{{ $category->name }}</strong>
            </div>
            <div class="detailItem">
                <span>Descrição:</span>
                <strong>{{ $category->description }}</strong>
            </div>
        </div>

        <div class="actions">
            <a href="{{ route('categories.index') }}" class="btn btnSecondary">Voltar</a>
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btnPrimary">Editar</a>
        </div>
    </div>
@endif
