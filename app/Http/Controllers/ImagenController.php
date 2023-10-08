<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    //
    public function store(Request $request){
        $imagen=$request->file('file');
        $nombreimagen=Str::uuid().".".$imagen->extension();
        $imagenServidor=Image::make($imagen);
        $imagenServidor->fit(1000,1000);
        
        $imagePath=public_path('uploads').'/'.$nombreimagen;
        $imagenServidor->save($imagePath);

        return response()->json(['imagen' => $nombreimagen]);
    }
}
