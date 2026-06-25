<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanEstudios extends Model
{
    protected $table      = 'plan_estudios';
    protected $primaryKey = 'Codigo';
    public    $timestamps = false;

    protected $fillable = [
        'Version',
        'Anio',
        'Codigo_Especialidad',
    ];

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'Codigo_Especialidad', 'Codigo');
    }

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'Codigo_PlanEstudios', 'Codigo');
    }
}