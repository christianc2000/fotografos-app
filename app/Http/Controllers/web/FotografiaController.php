<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class FotografiaController extends Controller
{
    public function create()
    {
        return view('fotografia.upload');
    }
    public function store(Request $request)
    {
        $uploadedFileUrl = Cloudinary::upload($request->file('foto')->getRealPath())->getSecurePath();
        
        return dd($uploadedFileUrl);
    }
}
