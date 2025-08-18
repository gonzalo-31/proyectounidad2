<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
class ProyectoWebController extends Controller
{
  
   

       

        
        public function index()
        {
            $proyectos = Proyecto::all();
            return view('proyectos.index', compact('proyectos'));
        }

       
        public function create()
        {
            return view('proyectos.create');
        }

       
        public function store(Request $request)
        {
            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'fecha_inicio' => 'required|date',
                'estado' => 'required|string',
                'responsable' => 'required|string',
                'monto' => 'required|numeric',
            ]);
            $validated['created_by'] = auth()->id();
            Proyecto::create($validated);
            return redirect()->route('proyectos.index')->with('success', 'Proyecto creado correctamente');
        }

        
        public function show($id)
        {
            $proyecto = Proyecto::find($id);
            return view('proyectos.show', compact('proyecto'));
        }

      
        public function edit($id)
        {
            $proyecto = Proyecto::find($id);
            return view('proyectos.edit', compact('proyecto'));
        }

       
        public function update(Request $request, $id)
        {
            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'fecha_inicio' => 'required|date',
                 'estado' => 'required|string',
                'responsable' => 'required|string',
                'monto' => 'required|numeric',
            ]);
            $proyecto = Proyecto::find($id);
            $proyecto->update($validated);
            return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado correctamente');
        }

        
        public function destroy($id)
        {
            $proyecto = Proyecto::find($id);
            $proyecto->delete();
            return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado correctamente');
        }
}
