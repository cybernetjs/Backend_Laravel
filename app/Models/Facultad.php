<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table      = 'facultad';
    protected $primaryKey = 'Codigo';
    public    $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Decano',
    ];

    public function especialidades()
    {
        return $this->hasMany(Especialidad::class, 'Codigo_Facultad', 'Codigo');
    }
}
