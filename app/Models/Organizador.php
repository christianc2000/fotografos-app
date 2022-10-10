<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizador extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];

    public function user()
    {
        return  $this->belongsTo(User::class);
    }
    //relación de 1 a muchos
    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }
}
