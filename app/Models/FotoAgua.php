<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoAgua extends Model
{
    use HasFactory;
    protected $fillable = ['dimension', 'fotografía_id', 'evento_id'];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
    public function fotografia()
    {
        return $this->belongsTo(Fotografía::class);
    }
}
