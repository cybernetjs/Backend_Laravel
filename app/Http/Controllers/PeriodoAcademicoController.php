<?php

namespace App\Http\Controllers;

use App\Models\PeriodoAcademico;
use Illuminate\Http\Request;

class PeriodoAcademicoController extends Controller
{
    public function index()
    {
        return response()->json(PeriodoAcademico::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'Semestre'     => 'required|string|max:20',
            'Fecha_Inicio' => 'required|date',
            'Fecha_Fin'    => 'required|date|after:Fecha_Inicio',
        ]);

        $periodo = PeriodoAcademico::create($request->all());
        return response()->json($periodo, 201);
    }

    public function show($id)
    {
        $periodo = PeriodoAcademico::findOrFail($id);
        return response()->json($periodo);
    }

    public function update(Request $request, $id)
    {
        $periodo = PeriodoAcademico::findOrFail($id);
        $periodo->update($request->all());
        return response()->json($periodo);
    }

    public function destroy($id)
    {
        PeriodoAcademico::findOrFail($id)->delete();
        return response()->json(['mensaje' => 'Periodo académico eliminado']);
    }
}
