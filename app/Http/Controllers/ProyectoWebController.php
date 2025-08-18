<?php




namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Helpers\UfHelper;
class ProyectoWebController extends Controller
{
  
   

       

        
        public function index()
        {
            $proyectos = Proyecto::all();
            $uf = UfHelper::getUf();
            return view('proyectos.index', compact('proyectos', 'uf'));
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
            $proyecto = Proyecto::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_fin' => $request->fecha_fin,
                'estado' => $request->estado,
                'responsable' => $request->responsable,
                'monto' => $request->monto,
                'created_by' => auth()->id() 
            ]);
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
