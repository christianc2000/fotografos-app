<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\FotoAgua;
use App\Models\Fotografía;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome(){
        $fotografias=FotoAgua::all();
        return view('welcome',compact('fotografias'));
    }
}
