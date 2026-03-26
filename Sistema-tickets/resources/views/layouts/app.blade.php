<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">

        {{-- NAVBAR --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('dashboard') }}">Sistema de Tickets</a>

                <div class="navbar-nav ms-auto align-items-center">
                    @auth
                        {{-- MENÚ ADMIN --}}
                        @if(Auth::user()->rol === 'admin')
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            <a class="nav-link" href="{{ route('admin.tickets.index') }}">Tickets</a>
                            <a class="nav-link" href="{{ route('admin.usuarios.index') }}">Usuarios</a>
                        @endif

                        {{-- MENÚ GERENTE --}}
                        @if(Auth::user()->rol === 'gerente')
                            <a class="nav-link" href="{{ route('gerente.dashboard') }}">Dashboard</a>
                            <a class="nav-link" href="{{ route('gerente.reportes') }}">Reportes</a>
                            <a class="nav-link" href="{{ route('gerente.tickets.index') }}">Tickets</a>
                        @endif

                        {{-- MENÚ USUARIO --}}
                        @if(Auth::user()->rol === 'usuario')
                            <a class="nav-link" href="{{ route('usuario.dashboard') }}">Mi Panel</a>
                            <a class="nav-link" href="{{ route('usuario.tickets.index') }}">Mis Tickets</a>
                            <a class="nav-link" href="{{ route('usuario.tickets.create') }}">Nuevo Ticket</a>
                        @endif

                        {{-- NOMBRE + ROL + LOGOUT --}}
                        <span class="nav-link text-light">
                            {{ Auth::user()->name }}
                            <span class="badge bg-secondary ms-1">{{ Auth::user()->rol }}</span>
                        </span>

                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-light ms-2">
                                Salir
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </nav>

        {{-- Mensajes flash --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible m-3">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible m-3">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- CONTENIDO DE CADA VISTA --}}
        <main>
            @yield('content')
        </main>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>