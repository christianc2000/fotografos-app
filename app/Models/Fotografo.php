<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotografo extends Model
{
    use HasFactory;
    protected $fillable=['biografia'];
    //relacion de 1 a muchos
    public function eventoFotografos(){
        return $this->hasMany(EventoFotografo::class);
    }
    public function fotografias(){
        return $this->hasMany(Fotografía::class);
    }
}
