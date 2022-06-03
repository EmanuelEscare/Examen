<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'descripcion', 'id_user', 'fechaInicio', 'fechaFin', 'password',
    ];

    public function usuarios(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
