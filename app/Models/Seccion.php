<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table      = 'seccion';
    protected $primaryKey = 'Codigo';
    public    $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Aforo',
        'Codigo_Curso',
        'Codigo_Docente',
        'Codigo_PeriodoAcademico',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'Codigo_Curso', 'Codigo');
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'Codigo_Docente', 'Codigo');
    }

    public function periodoAcademico()
    {
        return $this->belongsTo(PeriodoAcademico::class, 'Codigo_PeriodoAcademico', 'Id');
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'Codigo_Seccion', 'Codigo');
    }
}
