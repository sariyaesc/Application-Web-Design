<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index() {
        return response()->json(Tarea::all(), 200);
    }

    public function store(Request $request) {
        $tarea = Tarea::create($request->all());
        return response()->json($tarea, 201);
    }

    public function show(Tarea $tarea) {
        return response()->json($tarea, 200);
    }

    public function update(Request $request, Tarea $tarea) {
        $tarea->update($request->all());
        return response()->json($tarea, 200);
    }

    public function destroy(Tarea $tarea) {
        $tarea->delete();
        return response()->json(null, 204);
    }
}
