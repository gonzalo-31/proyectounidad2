<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Validation\ValidationException;


class ProyectoController extends Controller
{
public function index()
{
    $proyectos = Proyecto::orderBy('nombre')->get();
    if ($proyectos->isEmpty()) {
        return response()->json([
            'status' => 'success',
            'data' => [],
            'message' => 'No se encontraron proyectos'
        ], JsonResponse::HTTP_OK);
    }

    return response()->json([
        'status' => 'success',
        'data' => $proyectos,
        'message' => 'Proyectos obtenidos exitosamente',
    ], JsonResponse::HTTP_OK);
    
    
}

public function show($id){
  $proyecto = Proyecto::find($id);

    if (!$proyecto) {
        return response()->json([
            'status' => 'error',
            'data' => [],
            'message' => 'No se encontró el proyecto'
        ], JsonResponse::HTTP_NOT_FOUND);
    }

    return response()->json([
        'status' => 'success',
        'data' => $proyecto,
        'message' => 'Proyecto obtenido exitosamente',
    ], JsonResponse::HTTP_OK);
}

public function store(Request $request)
{
    try {
        
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'estado' => 'required|string',
            'responsable' => 'required|string',
            'monto' => 'required|numeric',
           
        ]);

    $data['created_by'] = auth()->check() ? auth()->id() : null;
    $proyecto = Proyecto::create($data);

        return response()->json([
            'status' => 'success',
            'data' => $proyecto,
            'message' => 'Proyecto creado exitosamente',
        ], JsonResponse::HTTP_CREATED);
    } catch (ValidationException $e) {
        return response()->json([
            'status' => 'error',
            'data' => [],
            'message' => 'Error de validación',
            'errors' => $e->errors(),
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    
    } catch (\Throwable $th) {
        return response()->json([
            'status' => 'error',
            'data' => [],
            'message' => 'Error al crear el proyecto. ' . $th->getMessage(),
        ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }
}
public function update(Request $request, $id)
{
    $proyecto = Proyecto::find($id);
    if (!$proyecto) {
        return response()->json([
            'status' => 'error',
            'data' => [],
            'message' => 'No se encontró el proyecto'
        ], JsonResponse::HTTP_NOT_FOUND);
    }
    try {
       

        if (empty($request->all())) {
            return response()->json([
                'status' => 'error',
                'data' => [],
                'message' => 'Debe agregar datos para actualizar el proyecto',
            ], JsonResponse::HTTP_BAD_REQUEST);
        }
        $data = $request->validate([
            'nombre' => '|string|max:255',
            'fecha_inicio' => '|date',
            'estado' => '|string',
            'responsable' => '|string',
            'monto' => '|numeric',
        ]);

        $data['created_by'] = auth()->check() ? auth()->id() : null;
        $proyecto->update($data);

        return response()->json([
            'status' => 'success',
            'data' => $proyecto,
            'message' => 'Proyecto actualizado exitosamente',
        ], JsonResponse::HTTP_OK);

    } catch (ValidationException $e) {
        return response()->json([
            'status' => 'error',
            'data' => [],
            'message' => 'Error de validación',
            'errors' => $e->errors(),
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    } catch (\Throwable $th) {
        return response()->json([
            'status' => 'error',
            'data' => [],
            'message' => 'Error al actualizar el proyecto. ' . $th->getMessage(),
        ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }
}
public function destroy($id)
{
    $proyecto = Proyecto::find($id);
    if (!$proyecto) {

        return response()->json([
            'status' => 'error',
            'message' => 'No se encontró el proyecto'
        ], JsonResponse::HTTP_NOT_FOUND);
    }

    $proyecto->delete();

    return response()->json(null, JsonResponse::HTTP_NO_CONTENT);
}
}