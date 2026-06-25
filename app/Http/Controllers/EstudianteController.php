<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index()
    {
        return response()->json(Estudiante::with('especialidad')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre'              => 'required|string|max:100',
            'Apellidos'           => 'required|string|max:100',
            'DNI'                 => 'required|string|max:15|unique:estudiante,DNI',
            'Direccion'           => 'nullable|string|max:150',
            'Codigo_Especialidad' => 'required|integer|exists:especialidad,Codigo',
        ]);

        $estudiante = Estudiante::create($request->all());
        return response()->json($estudiante, 201);
    }

    public function show($id)
    {
        $estudiante = Estudiante::with('especialidad')->findOrFail($id);
        return response()->json($estudiante);
    }

    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update($request->all());
        return response()->json($estudiante);
    }

    public function destroy($id)
    {
        Estudiante::findOrFail($id)->delete();
        return response()->json(['mensaje' => 'Estudiante eliminado']);
    }
}
