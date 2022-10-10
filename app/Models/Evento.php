<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'descripcion', 'tipo', 'fecha', 'direccion', 'gps', 'estado', 'organizador_id'];

    //relacion de 1 a muchos
    public function eventoFotografos()
    {
        return $this->hasMany(EventoFotografo::class);
    }
    public function fotoaguas()
    {
        return $this->hasMany(FotoAgua::class);
    }
    //relación inversa de 1 a muchos
    public function organizador()
    {
        return $this->belongsTo(Organizador::class);
    }
}
