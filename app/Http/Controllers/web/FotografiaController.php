<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Fotografo;
use App\Models\Fotografía;
use Cloudinary\Asset\File;
use Cloudinary\Tag\ImageTag;
use Cloudinary\Transformation\Delivery;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Intervention\Image\File as ImageFile;

// import the Intervention Image Manager Class
//use Intervention\Image\ImageManager;



class FotografiaController extends Controller
{
    public function index()
    {
        $fotografo = Fotografo::all()->first(); //cambiar por el fotografo loggueado
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

           /* $img = (new ImageTag($result->getPath()))
                ->delivery(Delivery::quality(30));
            
              return $img;
*/
            // indicar la imagen para la marca de agua y la posición
            /* $image->insert(public_path('images/logo.png'), 'bottom-right');
            $image->save(public_path('images/' . $name));
            return redirect()->route('watermark-image-form')->with(['image' => $name]);*/
            $foto = Fotografía::create([
                'dimension' => $result->getWidth() . 'x' . $result->getHeight(),
                'tipo' => true,
                'url' => $result->getPath(),
                'fotografo_id' => 1,
            ]);

            return redirect()->route('fotografia.index');
        } else {
            return "no entra";
        }
    }
}
