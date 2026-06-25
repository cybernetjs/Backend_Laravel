<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        return response()->json(Docente::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre'    => 'required|string|max:100',
            'Apellidos' => 'required|string|max:100',
            'Categoria' => 'required|string|max:50',
            'Email'     => 'required|email|unique:docente,Email',
        ]);

        $docente = Docente::create($request->all());
        return response()->json($docente, 201);
    }

    public function show($id)
    {
        $docente = Docente::findOrFail($id);
        return response()->json($docente);
    }

    public function update(Request $request, $id)
    {
        $docente = Docente::findOrFail($id);
        $docente->update($request->all());
        return response()->json($docente);
    }

    public function destroy($id)
    {
        Docente::findOrFail($id)->delete();
        return response()->json(['mensaje' => 'Docente eliminado']);
    }
}
