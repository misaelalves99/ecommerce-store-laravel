<!-- resources/views/brands/edit.blade.php -->

@extends('layouts.app')

@push('styles')
    @vite(['resources/css/brands/edit-brand-page.css'])
@endpush

@section('content')
    @if(!$brand)
        <p class="loading">Carregando marca...</p>
    @else
        <div class="pageContainer">
            <h1 class="heading">Editar Marca</h1>

            <form action="{{ route('brands.update', $brand->id) }}" method="POST" class="formContainer">
                @csrf
                @method('PUT')

                <label for="name" class="label">Nome</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="inputField"
                    value="{{ old('name', $brand->name) }}"
                    required
                />
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="buttonGroup">
                    <button type="submit" class="btnPrimary">Salvar</button>
                    <a href="{{ route('brands.index') }}" class="btnSecondary">Cancelar</a>
                </div>
            </form>
        </div>
    @endif
@endsection
