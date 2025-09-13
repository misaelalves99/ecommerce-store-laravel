<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('title', 'Produtos')

@push('styles')
    @vite(['resources/css/products/index-page.css'])
@endpush

@section('content')
<div class="container">
    <div class="header">
        <h1 class="heading">Produtos</h1>
        <a href="{{ route('products.create') }}" class="btn btnPrimary">
            Adicionar Produto
        </a>
    </div>

    @if($products->isEmpty())
        <p class="empty">Nenhum produto cadastrado.</p>
    @else
        <table class="productList">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>SKU</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <span class="badge {{ $product->is_active ? 'badgeSuccess' : 'badgeSecondary' }}">
                            {{ $product->is_active ? 'Ativo' : 'Inativo' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btnInfo">Detalhes</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btnWarning">Editar</a>

                        <!-- Formulário de exclusão -->
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btnDanger"
                                onclick="return confirm('Tem certeza que deseja excluir este produto?')">
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
