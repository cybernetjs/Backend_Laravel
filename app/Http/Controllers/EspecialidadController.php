<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    public function index()
    {
        return response()->json(Especialidad::with('facultad')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre'          => 'required|string|max:100',
            'Modalidad'       => 'required|string|max:50',
            'Codigo_Facultad' => 'required|integer|exists:facultad,Codigo',
        ]);

        $especialidad = Especialidad::create($request->all());
        return response()->json($especialidad, 201);
    }

    public function show($id)
    {
        $especialidad = Especialidad::with('facultad')->findOrFail($id);
        return response()->json($especialidad);
    }

    public function update(Request $request, $id)
    {
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->update($request->all());
        return response()->json($especialidad);
    }

    public function destroy($id)
    {
        Especialidad::findOrFail($id)->delete();
        return response()->json(['mensaje' => 'Especialidad eliminada']);
    }
}
