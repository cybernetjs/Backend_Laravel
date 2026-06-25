<?php

namespace App\Http\Controllers;

use App\Models\PlanEstudios;
use Illuminate\Http\Request;

class PlanEstudiosController extends Controller
{
    public function index()
    {
        return response()->json(PlanEstudios::with('especialidad')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'Version'             => 'required|string|max:20',
            'Anio'                => 'required|integer',
            'Codigo_Especialidad' => 'required|integer|exists:especialidad,Codigo',
        ]);

        $plan = PlanEstudios::create($request->all());
        return response()->json($plan, 201);
    }

    public function show($id)
    {
        $plan = PlanEstudios::with('especialidad')->findOrFail($id);
        return response()->json($plan);
    }

    public function update(Request $request, $id)
    {
        $plan = PlanEstudios::findOrFail($id);
        $plan->update($request->all());
        return response()->json($plan);
    }

    public function destroy($id)
    {
        PlanEstudios::findOrFail($id)->delete();
        return response()->json(['mensaje' => 'Plan de estudios eliminado']);
    }
}
