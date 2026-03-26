@extends('layouts.app')

@section('title', 'Nuevo Ticket')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Crear Nuevo Ticket</h2>

    <form method="POST" action="{{ route('usuario.tickets.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Descripción corta *</label>
            <input type="text" name="descripcion_corta" class="form-control @error('descripcion_corta') is-invalid @enderror"
                   value="{{ old('descripcion_corta') }}">
            @error('descripcion_corta')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Categoría *</label>
            <select name="categoria" class="form-select @error('categoria') is-invalid @enderror">
                <option value="">-- Selecciona --</option>
                @foreach (['software','hardware','comunicaciones','plataformas','email','otro'] as $cat)
                    <option value="{{ $cat }}" @selected(old('categoria') === $cat)>
                        {{ ucfirst($cat) }}
                    </option>
                @endforeach
            </select>
            @error('categoria')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nivel de urgencia *</label>
            <select name="nivel_urgencia" class="form-select @error('nivel_urgencia') is-invalid @enderror">
                <option value="">-- Selecciona --</option>
                @foreach (['baja','media','alta','critica'] as $nivel)
                    <option value="{{ $nivel }}" @selected(old('nivel_urgencia') === $nivel)>
                        {{ ucfirst($nivel) }}
                    </option>
                @endforeach
            </select>
            @error('nivel_urgencia')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Departamento *</label>
            <input type="text" name="departamento" class="form-control @error('departamento') is-invalid @enderror"
                   value="{{ old('departamento') }}">
            @error('departamento')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción detallada</label>
            <textarea name="descripcion_detallada" class="form-control" rows="4">{{ old('descripcion_detallada') }}</textarea>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Crear Ticket</button>
            <a href="{{ route('usuario.tickets.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection