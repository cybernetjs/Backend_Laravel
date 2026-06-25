<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index()
    {
        return response()->json(
            Matricula::with([
                'estudiante',
                'seccion.curso',
                'seccion.docente',
                'periodoAcademico',
                'nota'
            ])->get()
        );
    }
    public function porEstudiante($id)
{
    $matriculas = Matricula::with([
        'estudiante',
        'seccion.curso',
        'seccion.docente',
        'periodoAcademico',
        'nota'
    ])->where('Codigo_Estudiante', $id)->get();

    return response()->json($matriculas);
}

    public function store(Request $request)
    {
        $request->validate([
            'FechaMatricula'          => 'required|date',
            'Codigo_Estudiante'       => 'required|integer|exists:estudiante,Codigo',
            'Codigo_Seccion'          => 'required|integer|exists:seccion,Codigo',
            'Codigo_PeriodoAcademico' => 'required|integer|exists:periodo_academico,Id',
        ]);

        $matricula = Matricula::create($request->all());
        return response()->json($matricula, 201);
    }

    public function show($id)
    {
        $matricula = Matricula::with([
            'estudiante',
            'seccion.curso',
            'seccion.docente',
            'periodoAcademico',
            'nota'
        ])->findOrFail($id);
        return response()->json($matricula);
    }

    public function update(Request $request, $id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->update($request->all());
        return response()->json($matricula);
    }

    public function destroy($id)
    {
        Matricula::findOrFail($id)->delete();
        return response()->json(['mensaje' => 'Matrícula eliminada']);
    }
}