<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeriodoAcademico extends Model
{
    protected $table      = 'PERIODO_ACADEMICO';
    protected $primaryKey = 'Id';
    public    $timestamps = false;

    protected $fillable = [
        'Semestre',
        'Fecha_Inicio',
        'Fecha_Fin',
    ];

    public function secciones()
    {
        return $this->hasMany(Seccion::class, 'Codigo_PeriodoAcademico', 'Id');
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'Codigo_PeriodoAcademico', 'Id');
    }
}