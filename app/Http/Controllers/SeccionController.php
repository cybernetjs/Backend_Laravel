<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    public function index()
    {
        return response()->json(Seccion::with(['curso', 'docente', 'periodoAcademico'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre'                  => 'required|string|max:20',
            'Aforo'                   => 'required|integer',
            'Codigo_Curso'            => 'required|integer|exists:curso,Codigo',
            'Codigo_Docente'          => 'required|integer|exists:docente,Codigo',
            'Codigo_PeriodoAcademico' => 'required|integer|exists:periodo_academico,Id',
        ]);

        $seccion = Seccion::create($request->all());
        return response()->json($seccion, 201);
    }

    public function show($id)
    {
        $seccion = Seccion::with(['curso', 'docente', 'periodoAcademico'])->findOrFail($id);
        return response()->json($seccion);
    }

    public function update(Request $request, $id)
    {
        $seccion = Seccion::findOrFail($id);
        $seccion->update($request->all());
        return response()->json($seccion);
    }

    public function destroy($id)
    {
        Seccion::findOrFail($id)->delete();
        return response()->json(['mensaje' => 'Sección eliminada']);
    }
}
