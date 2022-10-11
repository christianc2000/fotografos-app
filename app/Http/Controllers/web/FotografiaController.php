<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\FotoAgua;
use App\Models\Fotografo;
use App\Models\Fotografía;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// import the Intervention Image Manager Class
//use Intervention\Image\ImageManager;



class FotografiaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $fotografo = Fotografo::findOrFail($user->fotografo->id); //cambiar por el fotografo loggueado
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

        $request->validate([
            'evento_id' => 'required|exists:eventos,id',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'publicado' => 'required|boolean',
            'tipo' => 'required|boolean',
        ]);

        if ($request->hasFile('foto')) {
            //       $uploadedFileUrl = Cloudinary::upload($request->file('foto')->getRealPath())->getSecurePath();

            
            $result = $request->foto->storeOnCloudinary();
            $foto = Fotografía::create([
                'dimension' => $result->getWidth() . 'x' . $result->getHeight(),
                'tipo' => true,
                'url' => $result->getPath(),
                'publicado' => true,
                'fotografo_id' => Auth::user()->id,
            ]);
            
            $resultagua = cloudinary()->upload($request->file('foto')->getRealPath(), [
                'resource_type' => 'image',
                'transformation' => array(
                    array('width' => 200, 'crop' => 'fit', 'effect' => "blur:100"),
                    array(
                        'overlay' => 'marca-agua-4_gsiizp', 'width' => 200, 'crop' => "scale",
                        'opacity' => 70
                    )
                )
            ]);
           // return $resultagua->getWidth();
            FotoAgua::create([
                'dimension' => $resultagua->getWidth() . 'x' . $resultagua->getHeight(),
                'url' => $resultagua->getPath(),
                'fotografía_id' => $foto->id,
                'evento_id' => $request->evento_id
            ]);
        
            

            return redirect()->route('fotografia.index');
        } else {
            return "no entra";
        }
    }
}
