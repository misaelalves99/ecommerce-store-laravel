<!-- resources/views/components/brand/brand-list.blade.php -->

@extends('layouts.app')

@section('title', 'Marcas')

@push('styles')
    @vite([
        'resources/css/components/brands/brand-list.css',
        'resources/css/components/brands/brand-details.css',
        'resources/css/components/brands/brand-form.css'
    ])
@endpush

@section('content')
<div class="BrandList">
    @if($brands->isEmpty())
        <div class="empty">Nenhuma marca cadastrada.</div>
    @else
        <table class="table BrandList">
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
                            <a href="{{ route('brands.show', $brand->id) }}" class="btn btnInfo">Detalhes</a>
                            <a href="{{ route('brands.edit', $brand->id) }}" class="btn btnWarning">Editar</a>
                            <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btnDanger" onclick="return confirm('Tem certeza que deseja excluir esta marca?')">
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
