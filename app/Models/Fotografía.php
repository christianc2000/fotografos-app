<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotografía extends Model
{
    use HasFactory;
    protected $fillable=['dimension','tipo','url','publicado','fotografo_id'];
 //relación de 1 a muchos
 
    //relación de 1 a muchos 
    public function etiquetaFotografias(){
        return $this->hasMany(EtiquetaFotografía::class);
    }
    public function fotoagua(){
        return $this->hasOne(FotoAgua::class);
    }
    //relación inversa de 1 a muchos
    public function fotografo(){
        return $this->belongsTo(Fotografo::class);
    }
}
