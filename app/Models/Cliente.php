<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable=['user_id','url'];
    //relación de 1 a muchos
    public function coincidencias(){
        return $this->hasMany(Coincidencia::class);
    }
    //relacion de 1 a muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }
}
