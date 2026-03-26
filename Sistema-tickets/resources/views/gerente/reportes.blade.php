@extends('layouts.app')

@section('title', 'Reportes')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-success">Reportes del Sistema</h2>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">Tickets por Categoría</div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead><tr><th>Categoría</th><th>Total</th></tr></thead>
                        <tbody>
                            @foreach ($porCategoria as $item)
                            <tr>
                                <td>{{ $item->categoria }}</td>
                                <td><span class="badge bg-success">{{ $item->total }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning">Tickets por Urgencia</div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead><tr><th>Urgencia</th><th>Total</th></tr></thead>
                        <tbody>
                            @foreach ($porUrgencia as $item)
                            <tr>
                                <td>{{ $item->nivel_urgencia }}</td>
                                <td><span class="badge bg-warning text-dark">{{ $item->total }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('gerente.dashboard') }}" class="btn btn-secondary mt-3">
        Volver al Dashboard
    </a>
</div>
@endsection