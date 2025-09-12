<!-- resources/views/brands/index.blade.php -->

@extends('layouts.app')

@push('styles')
    @vite(['resources/css/brands/index-page.css'])
@endpush

@section('content')
<div class="container">
    <div class="header">
        <h1 class="heading">Marcas</h1>
        <a href="{{ route('brands.create') }}" class="btn">Adicionar Marca</a>
    </div>

    @if($brands->isEmpty())
        <p class="empty">Nenhuma marca encontrada.</p>
    @else
        <table class="brandList">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>
                            <a href="{{ route('brands.show', $brand->id) }}" class="btn btn-info">Detalhes</a>
                            <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Tem certeza que deseja excluir a marca {{ $brand->name }}?');">
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
