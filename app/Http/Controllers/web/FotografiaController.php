<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Fotografo;
use App\Models\Fotografía;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class FotografiaController extends Controller
{
    public function index()
    {
        $fotografo = Fotografo::all()->first();//cambiar por el fotografo loggueado
        $fotografias = $fotografo->fotografias;
        $eventos = $fotografo->eventoFotografos;
        return view('web.fotografo.fotografia-index', compact('fotografias', 'eventos'));
    }
    public function create()
    {
        return view('fotografia.upload');
    }
    public function store(Request $request)
    {
       
        if ($request->hasFile('foto')) {

            // $uploadedFileUrl = Cloudinary::upload($request->file('foto')->getRealPath())->getSecurePath();

            $result = $request->foto->storeOnCloudinary();

            $foto = Fotografía::create([
                'dimension' => $result->getWidth() . 'x' . $result->getHeight(),
                'tipo' => true,
                'url' => $result->getPath(),
                'fotografo_id' => 1,
            ]);
            return redirect()->route('fotografia.index');
        }else{
            return "no entra";
        }
    }
}
