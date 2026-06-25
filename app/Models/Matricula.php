<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table      = 'matricula';
    protected $primaryKey = 'Codigo';
    public    $timestamps = false;

    protected $fillable = [
        'FechaMatricula',
        'Codigo_Estudiante',
        'Codigo_Seccion',
        'Codigo_PeriodoAcademico',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'Codigo_Estudiante', 'Codigo');
    }

    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'Codigo_Seccion', 'Codigo');
    }

    public function periodoAcademico()
    {
        return $this->belongsTo(PeriodoAcademico::class, 'Codigo_PeriodoAcademico', 'Id');
    }

    public function nota()
    {
        return $this->hasOne(Nota::class, 'Codigo_Matricula', 'Codigo');
    }
}
