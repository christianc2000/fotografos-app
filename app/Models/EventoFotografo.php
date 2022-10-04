<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoFotografo extends Model
{
    use HasFactory;
    protected $fillable=['evento_id','fotografo_id'];
    //relación inversa de 1 a muchos
    public function evento(){
        return $this->belongsTo(Evento::class);
    }
    public function fotografo(){
        return $this->belongsTo(Fotografo::class);
    }
}
