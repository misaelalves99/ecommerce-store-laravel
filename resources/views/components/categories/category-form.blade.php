<!-- resources/views/categories/category-form.blade.php -->

@props([
    'category' => null, {{-- objeto category opcional --}}
    'submitRoute' => null, 
    'cancelRoute' => null
])

@push('styles')
    @vite('resources/css/components/categories/category-form.css')
@endpush

<form method="POST" action="{{ $submitRoute }}" class="formContainer">
    @csrf
    @if($category)
        @method('PUT')
    @endif

    {{-- Nome --}}
    <div class="formGroup">
        <label class="label">Nome</label>
        <input 
            type="text" 
            name="name" 
            class="inputField" 
            value="{{ old('name', $category->name ?? '') }}" 
            autofocus
        />
        @error('name')
            <span class="errorText">{{ $message }}</span>
        @enderror
    </div>

    {{-- Descrição --}}
    <div class="formGroup">
        <label class="label">Descrição</label>
        <textarea 
            name="description" 
            class="textareaField"
        >{{ old('description', $category->description ?? '') }}</textarea>
        @error('description')
            <span class="errorText">{{ $message }}</span>
        @enderror
    </div>

    {{-- Botões --}}
    <div class="buttonGroup">
        <button type="submit" class="btnPrimary">Salvar</button>

        @if($cancelRoute)
            <a href="{{ $cancelRoute }}" class="btnSecondary">Cancelar</a>
        @endif
    </div>
</form>
