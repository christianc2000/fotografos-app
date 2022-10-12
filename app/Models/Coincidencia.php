<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coincidencia extends Model
{
    use HasFactory;
    protected $fillable=['cliente_id','fotografía_id'];
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function fotografia(){
        return $this->belongsTo(Fotografía::class);
    }
}
