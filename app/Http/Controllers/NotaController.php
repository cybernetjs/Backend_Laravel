<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function index()
    {
        return response()->json(Nota::with('matricula')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'NotaParcial'      => 'nullable|numeric|min:0|max:20',
            'NotaFinal'        => 'nullable|numeric|min:0|max:20',
            'Estado'           => 'required|in:PENDIENTE,APROBADO,DESAPROBADO',
            'Codigo_Matricula' => 'required|integer|exists:matricula,Codigo|unique:nota,Codigo_Matricula',
        ]);

        $nota = Nota::create($request->all());
        return response()->json($nota, 201);
    }

    public function show($id)
    {
        $nota = Nota::with('matricula')->findOrFail($id);
        return response()->json($nota);
    }

    public function update(Request $request, $id)
    {
        $nota = Nota::findOrFail($id);
        $nota->update($request->all());
        return response()->json($nota);
    }

    public function destroy($id)
    {
        Nota::findOrFail($id)->delete();
        return response()->json(['mensaje' => 'Nota eliminada']);
    }
}
