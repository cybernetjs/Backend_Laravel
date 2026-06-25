<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table      = 'curso';
    protected $primaryKey = 'Codigo';
    public    $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Creditos',
        'HorasTeoria',
        'HorasPractica',
        'Codigo_PlanEstudios',
    ];

    public function planEstudios()
    {
        return $this->belongsTo(PlanEstudios::class, 'Codigo_PlanEstudios', 'Codigo');
    }

    public function secciones()
    {
        return $this->hasMany(Seccion::class, 'Codigo_Curso', 'Codigo');
    }
}
