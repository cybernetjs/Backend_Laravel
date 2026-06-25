<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table      = 'estudiante';
    protected $primaryKey = 'Codigo';
    public    $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Apellidos',
        'DNI',
        'Direccion',
        'Codigo_Especialidad',
    ];

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'Codigo_Especialidad', 'Codigo');
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'Codigo_Estudiante', 'Codigo');
    }
}
