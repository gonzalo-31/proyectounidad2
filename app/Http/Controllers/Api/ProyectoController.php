<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyecto;
class ProyectoController extends Controller
{
public function index()
{
    $proyectos = Proyecto::all();
    if ($proyectos->isEmpty()) {
        return response()->json(['message' => 'No se encontraron proyectos'], 404);
    }
    return response()->json($proyectos);
}
public function show($id)
{
    $proyecto = Proyecto::find($id);
    if (!$proyecto) {
        return response()->json(['message' => 'Proyecto no encontrado'], 404);
    }
    return response()->json($proyecto);
}
public function store(Request $request)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'fecha_inicio' => 'required|date',
        'estado' => 'required|string',
        'responsable' => 'required|string',
        'monto' => 'required|numeric',
        'created_by' => 'nullable|exists:users,id', 
    ]);

    $proyecto = Proyecto::create([
        'nombre' => $request->nombre,
        'fecha_inicio' => $request->fecha_inicio,
        'estado' => $request->estado,
        'responsable' => $request->responsable,
        'monto' => $request->monto,
        'created_by' => auth()->check() ? auth()->id() : null
    ]);

    return response()->json($proyecto, 201);
}
public function update(Request $request, $id)
{
    $proyecto = Proyecto::find($id);
    if (!$proyecto) {
        return response()->json(['message' => 'Proyecto no encontrado'], 404);
    }

    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'fecha_inicio' => 'required|date',
        'estado' => 'required|string',
        'responsable' => 'required|string',
        'monto' => 'required|numeric',
    ]);

    $proyecto->update($validated);

    return response()->json($proyecto);
}
public function destroy($id)
{
    $proyecto = Proyecto::find($id);
    if (!$proyecto) {
        return response()->json(['message' => 'Proyecto no encontrado'], 404);
    }

    $proyecto->delete();
    return response()->json(['message' => 'Proyecto eliminado']);
}
}