<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtiquetaFotografía extends Model
{
    use HasFactory;
    protected $fillable=['etiqueta_id','fotografia_id'];
    //relación inversa de 1 a muchos
    public function etiqueta(){
        return $this->belongsTo(Etiqueta::class);
    }
    public function fotografia(){
        return $this->belongsTo(Fotografía::class);
    }
}
