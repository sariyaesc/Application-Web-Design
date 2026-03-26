@extends('layouts.app')

@section('title', 'Mis Tickets')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Mis Tickets</h2>
        <a href="{{ route('usuario.tickets.create') }}" class="btn btn-primary">
            + Nuevo Ticket
        </a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Número</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Urgencia</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tickets as $ticket)
            <tr>
                <td>{{ $ticket->numero_reporte }}</td>
                <td>{{ $ticket->descripcion_corta }}</td>
                <td>{{ $ticket->categoria }}</td>
                <td>
                    <span class="badge 
                        @if($ticket->nivel_urgencia === 'critica') bg-danger
                        @elseif($ticket->nivel_urgencia === 'alta') bg-warning text-dark
                        @elseif($ticket->nivel_urgencia === 'media') bg-info text-dark
                        @else bg-secondary
                        @endif">
                        {{ $ticket->nivel_urgencia }}
                    </span>
                </td>
                <td><span class="badge bg-secondary">{{ $ticket->status }}</span></td>
                <td>{{ \Carbon\Carbon::parse($ticket->fecha_reporte)->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('usuario.tickets.show', $ticket) }}" 
                       class="btn btn-sm btn-outline-primary">
                        Ver
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No tienes tickets aún.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection