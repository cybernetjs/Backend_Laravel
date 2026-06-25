<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table      = 'nota';
    protected $primaryKey = 'Codigo';
    public    $timestamps = false;

    protected $fillable = [
        'NotaParcial',
        'NotaFinal',
        'Estado',
        'Codigo_Matricula',
    ];

    public function matricula()
    {
        return $this->belongsTo(Matricula::class, 'Codigo_Matricula', 'Codigo');
    }
}
