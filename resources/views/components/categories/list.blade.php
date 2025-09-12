<!-- resources/views/categories/list.blade.php -->

@props(['categories'])

@push('styles')
    @vite('resources/css/components/categories/category-list.css')
@endpush

@if($categories->isEmpty())
    <p class="empty">Nenhuma categoria cadastrada.</p>
@else
    <table class="table">
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
                            <button type="submit" class="btn btnDanger" onclick="return confirm('Deseja realmente excluir esta categoria?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
