@extends('layouts.app')

@section('title', 'Todos los Tickets')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-success">Todos los Tickets</h2>
        <a href="{{ route('gerente.dashboard') }}" class="btn btn-secondary">
            Volver al Dashboard
        </a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Número</th>
                <th>Descripción</th>
                <th>Cliente</th>
                <th>Categoría</th>
                <th>Urgencia</th>
                <th>Estado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tickets as $ticket)
            <tr>
                <td>{{ $ticket->numero_reporte }}</td>
                <td>{{ $ticket->descripcion_corta }}</td>
                <td>{{ $ticket->cliente_nombre }}</td>
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
                <td>
                    <span class="badge bg-secondary">{{ $ticket->status }}</span>
                </td>
                <td>{{ \Carbon\Carbon::parse($ticket->fecha_reporte)->format('d/m/Y') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No hay tickets registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection