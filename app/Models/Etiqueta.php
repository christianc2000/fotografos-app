<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;
    protected $fillable=['nombre'];
    //relación de 1 a muchos 
    public function etiquetaFotografias(){
        return $this->hasMany(EtiquetaFotografía::class);
    }
}
