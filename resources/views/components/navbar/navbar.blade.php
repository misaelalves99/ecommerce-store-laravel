<!-- resources/views/components/navbar/navbar.blade.php -->

@php
    $collapsed = $collapsed ?? false;
@endphp

@push('styles')
    @vite('resources/css/components/navbar/navbar.css')
@endpush

<nav class="navbar navbar-expand-lg">
    <div class="container-navbar">
        <a href="{{ route('home') }}" class="navbar-brand">
            Loja Virtual
        </a>

        <button class="navbar-toggler" type="button" onclick="toggleNavbar()" aria-controls="navbarMain" aria-expanded="{{ !$collapsed }}" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navbarMain" class="navbar-collapse {{ $collapsed ? 'collapse' : '' }}">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">Produtos</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">Categorias</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('brands.index') }}" class="nav-link {{ request()->routeIs('brands.*') ? 'active' : '' }}">Marcas</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@push('scripts')
<script>
function toggleNavbar() {
    const navbar = document.getElementById('navbarMain');
    navbar.classList.toggle('collapse');
}
</script>
@endpush
