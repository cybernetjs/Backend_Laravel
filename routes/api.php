<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacultadController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\PlanEstudiosController;
use App\Http\Controllers\PeriodoAcademicoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\NotaController;

Route::apiResource('facultades', FacultadController::class);
Route::apiResource('especialidades', EspecialidadController::class);
Route::apiResource('planes-estudios', PlanEstudiosController::class);
Route::apiResource('periodos-academicos', PeriodoAcademicoController::class);
Route::apiResource('docentes', DocenteController::class);
Route::apiResource('estudiantes', EstudianteController::class);
Route::apiResource('cursos', CursoController::class);
Route::apiResource('secciones', SeccionController::class);
Route::apiResource('matriculas', MatriculaController::class);
Route::apiResource('notas', NotaController::class);
Route::get('estudiantes/{id}/matriculas', [MatriculaController::class, 'porEstudiante']);