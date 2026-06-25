<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table      = 'docente';
    protected $primaryKey = 'Codigo';
    public    $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Apellidos',
        'Categoria',
        'Email',
    ];

    public function secciones()
    {
        return $this->hasMany(Seccion::class, 'Codigo_Docente', 'Codigo');
    }
}
