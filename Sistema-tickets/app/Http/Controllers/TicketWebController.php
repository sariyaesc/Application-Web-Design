<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketWebController extends Controller
{
    // GET /tickets
    public function index()
    {
        $tickets = Ticket::orderBy('fecha_reporte', 'desc')->get();
        return view('tickets.index', compact('tickets'));
    }

    // GET /tickets/create
    public function create()
    {
        return view('tickets.create');
    }

    // POST /tickets
    public function store(Request $request)
    {
        Ticket::create($request->all());
        return redirect()->route('tickets.index')
            ->with('success', 'Ticket creado exitosamente.');
    }

    // GET /tickets/{ticket}
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    // GET /tickets/{ticket}/edit
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    // PUT /tickets/{ticket}
    public function update(Request $request, Ticket $ticket)
    {
        $ticket->update($request->all());
        return redirect()->route('tickets.index')
            ->with('success', 'Ticket actualizado correctamente.');
    }

    // DELETE /tickets/{ticket}
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')
            ->with('success', 'Ticket eliminado.');
    }


    public function close(Ticket $ticket)
    {
        // Puntos extra: Validar que solo se cierren tickets en curso o pendientes
        if ($ticket->status !== 'en_curso' && $ticket->status !== 'pendiente') {
            // ERROR AQUÍ: Debes agregar "admin." antes de "tickets.index"
            return redirect()->route('admin.tickets.index')
                ->with('error', 'El ticket no se puede cerrar porque ya está finalizado o cancelado.');
        }

        // Requisito 1: Cambiar el status a 'finalizada'
        $ticket->status = 'finalizada';

        // Requisito 2: Asignar fecha_resolucion al momento actual
        $ticket->fecha_resolucion = now();

        $ticket->save();

        // Requisito 3: Redirigir con mensaje de éxito
        // ESTE YA ESTÁ BIEN
        return redirect()->route('admin.tickets.index')
            ->with('success', 'Ticket cerrado con éxito.');
    }
}
