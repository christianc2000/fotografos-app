<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $fillable=['titulo','descripcion','tipo','fecha','hora','direccion','gps'];

    //relacion de 1 a muchos
    public function eventoFotografos(){
        return $this->hasMany(EventoFotografo::class);
    }
}
