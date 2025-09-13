<!-- resources/views/categories/index.blade.php -->

@extends('layouts.app')

@section('title', 'Categorias')

@push('styles')
    @vite(['resources/css/categories/index-page.css'])
@endpush

@section('content')
<div class="container">
    <div class="header">
        <h1 class="heading">Categorias</h1>
        <a href="{{ route('categories.create') }}" class="btn btnInfo">Adicionar Categoria</a>
    </div>

    @if($categories->isEmpty())
        <div class="empty">Nenhuma categoria cadastrada.</div>
    @else
        <table class="categoryList">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btnInfo">Detalhes</a>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btnWarning">Editar</a>

                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btnDanger"
                                    onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
