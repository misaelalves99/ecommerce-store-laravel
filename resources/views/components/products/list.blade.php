<!-- resources/views/products/list.blade.php -->

@props(['products'])

@push('styles')
    @vite('resources/css/components/products/product-list.css')
@endpush

@if($products->isEmpty())
    <div class="ProductList empty">Nenhum produto encontrado</div>
@else
    <table class="ProductList">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $prod)
                <tr>
                    <td>{{ $prod->id }}</td>
                    <td>{{ $prod->name }}</td>
                    <td>R$ {{ number_format($prod->price, 2, ',', '.') }}</td>
                    <td>{{ $prod->category->name ?? $prod->category_id }}</td>
                    <td>{{ $prod->brand->name ?? $prod->brand_id }}</td>
                    <td>
                        <span class="badge {{ $prod->isActive ? 'badgeSuccess' : 'badgeSecondary' }}">
                            {{ $prod->isActive ? 'Ativo' : 'Inativo' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('products.show', $prod->id) }}" class="btn btnInfo">Detalhes</a>
                        <a href="{{ route('products.edit', $prod->id) }}" class="btn btnWarning">Editar</a>
                        <form action="{{ route('products.destroy', $prod->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btnDanger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
