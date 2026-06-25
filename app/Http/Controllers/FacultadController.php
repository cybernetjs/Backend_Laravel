<?php

namespace App\Http\Controllers;

use App\Models\Facultad;
use Illuminate\Http\Request;

class FacultadController extends Controller
{
    // GET /api/facultades → listar todas
    public function index()
    {
        return response()->json(Facultad::all());
    }

    // POST /api/facultades → crear nueva
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string|max:100',
            'Decano' => 'required|string|max:100',
        ]);

        $facultad = Facultad::create($request->all());
        return response()->json($facultad, 201);
    }

    // GET /api/facultades/{id} → mostrar una
    public function show($id)
    {
        $facultad = Facultad::findOrFail($id);
        return response()->json($facultad);
    }

    // PUT /api/facultades/{id} → actualizar
    public function update(Request $request, $id)
    {
        $facultad = Facultad::findOrFail($id);
        $facultad->update($request->all());
        return response()->json($facultad);
    }

    // DELETE /api/facultades/{id} → eliminar
    public function destroy($id)
    {
        Facultad::findOrFail($id)->delete();
        return response()->json(['mensaje' => 'Facultad eliminada']);
    }
}
