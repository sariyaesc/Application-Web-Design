@extends('layouts.app')

@section('title', 'Gestionar Usuarios')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Gestión de Usuarios</h2>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>
                    <span class="badge bg-secondary">{{ $usuario->rol }}</span>
                </td>
                <td class="d-flex gap-1">
                    {{-- Cambiar rol --}}
                    <form method="POST" action="{{ route('admin.usuarios.cambiar-rol', $usuario) }}">
                        @csrf
                        @method('PATCH')
                        <select name="rol" class="form-select form-select-sm d-inline w-auto">
                            <option value="admin"   @selected($usuario->rol === 'admin')>Admin</option>
                            <option value="gerente" @selected($usuario->rol === 'gerente')>Gerente</option>
                            <option value="usuario" @selected($usuario->rol === 'usuario')>Usuario</option>
                        </select>
                        <button class="btn btn-sm btn-primary ms-1">Cambiar</button>
                    </form>

                    {{-- Eliminar --}}
                    <form method="POST" action="{{ route('admin.usuarios.destroy', $usuario) }}"
                          onsubmit="return confirm('¿Eliminar este usuario?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection