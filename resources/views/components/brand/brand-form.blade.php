<!-- resources/views/components/brand/brand-form.blade.php -->

@props([
    'initialName' => '',
    'submitRoute' => null, {{-- rota onde o form será enviado --}}
    'cancelRoute' => null   {{-- rota para cancelar --}}
])

@push('styles')
    @vite('resources/css/components/brands/brand-form.css')
@endpush

<form method="POST" action="{{ $submitRoute }}" class="form">
    @csrf

    <div class="formGroup">
        <label class="label">Nome da Marca</label>
        <input 
            class="input" 
            type="text" 
            name="name" 
            value="{{ old('name', $initialName) }}" 
            required 
            autofocus
        />

        {{-- Exibição de erro de validação do Laravel --}}
        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div class="buttonGroup">
        <button type="submit" class="successBtn">Salvar</button>

        @if($cancelRoute)
            <a href="{{ $cancelRoute }}" class="cancelBtn">Cancelar</a>
        @endif
    </div>
</form>
