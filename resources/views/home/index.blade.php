<!-- resources/views/home/index.blade.php -->

@extends('layouts.app')

@section('title', 'Painel Administrativo')

@push('styles')
    @vite(['resources/css/home/home-page.css'])
@endpush

@section('content')
<div class="container home-container">
    <h1 class="title home-title">Bem-vindo ao Painel Administrativo</h1>

    <div class="buttonsRow">
        <a href="{{ route('products.index') }}" class="btn btnDark">Gerenciar Produtos</a>
        <a href="{{ route('categories.index') }}" class="btn btnSuccess">Gerenciar Categorias</a>
        <a href="{{ route('brands.index') }}" class="btn btnPrimary">Gerenciar Marcas</a>
    </div>

    <p class="description">
        Use os botões acima para gerenciar marcas, categorias e produtos de forma rápida e segura.
    </p>
</div>
@endsection
