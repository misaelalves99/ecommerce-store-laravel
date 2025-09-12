<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Painel Administrativo')</title>

    {{-- Bundle principal (JS + CSS) --}}
    @vite(['resources/js/app.js'])

    {{-- Estilos adicionais por página --}}
    @stack('styles')
</head>
<body class="flex flex-col min-h-screen">

    {{-- Navbar --}}
    @include('components.navbar.navbar')

    {{-- Main Content --}}
    <main class="container flex-1 my-6 px-4">
        @if(session('success'))
            <div class="flash-success mb-4">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="flash-error mb-4">{{ session('error') }}</div>
        @endif

        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer.footer')

    @stack('scripts')
</body>
</html>
