<?php

namespace App\Http\Controllers;

use App\Models\Consola;
use Illuminate\Http\Request;

class ConsolaController extends Controller
{
    // Mostrar lista de consolas
    public function index()
{
    // Obtener todas las consolas
    $consolas = Consola::all(); // Asegúrate de que el modelo Consola esté correctamente importado

    // Pasar las consolas a la vista
    return view('gestionar-consolas', compact('consolas'));
}


    // Almacenar nueva consola
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'marca' => 'required',
            'version' => 'required',
            'precio' => 'required|numeric',
        ]);

        Consola::create($request->all());
        return redirect()->route('gestionar-consolas')->with('success', 'Consola agregada correctamente.');
    }

    // Editar consola
    public function edit($id)
    {
        $consolas = Consola::all();
        $consolaEditando = Consola::findOrFail($id);
        return view('gestionar-consolas', compact('consolas', 'consolaEditando'));
    }



    // Actualizar consola
    public function update(Request $request, $id)
    {
        $consola = Consola::findOrFail($id);
        $consola->update($request->only(['nombre', 'marca', 'version', 'precio']));
        return redirect()->route('gestionar-consolas')->with('success', 'Consola actualizada');
    }
    
    

    // Eliminar consola
    public function destroy($id)
    {
        $consola = Consola::findOrFail($id);
        $consola->delete();

        return redirect()->route('gestionar-consolas')->with('success', 'Consola eliminada correctamente.');
    }
}



