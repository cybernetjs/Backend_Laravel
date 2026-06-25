<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table      = 'especialidad';
    protected $primaryKey = 'Codigo';
    public    $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Modalidad',
        'Codigo_Facultad',
    ];

    public function facultad()
    {
        return $this->belongsTo(Facultad::class, 'Codigo_Facultad', 'Codigo');
    }

    public function planesEstudios()
    {
        return $this->hasMany(PlanEstudios::class, 'Codigo_Especialidad', 'Codigo');
    }

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'Codigo_Especialidad', 'Codigo');
    }
}

