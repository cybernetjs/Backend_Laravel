<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        return response()->json(Curso::with('planEstudios')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre'              => 'required|string|max:100',
            'Creditos'            => 'required|integer',
            'HorasTeoria'         => 'required|integer',
            'HorasPractica'       => 'required|integer',
            'Codigo_PlanEstudios' => 'required|integer|exists:plan_estudios,Codigo',
        ]);

        $curso = Curso::create($request->all());
        return response()->json($curso, 201);
    }

    public function show($id)
    {
        $curso = Curso::with('planEstudios')->findOrFail($id);
        return response()->json($curso);
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->update($request->all());
        return response()->json($curso);
    }

    public function destroy($id)
    {
        Curso::findOrFail($id)->delete();
        return response()->json(['mensaje' => 'Curso eliminado']);
    }
}
