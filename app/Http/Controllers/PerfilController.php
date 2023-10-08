<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        return view('perfil.index');
    }

    public function store( Request $request)
    {
        $request->request->add([
                            'username'=>Str::slug($request->username)]
                        );
        
        $this->validate($request,[
            'username'=>['required','unique:users,username,'.auth()->user()->id,'min:3','max:20','not_in:twitter,editar-perfil'],
            'email'=>'required|email|max:60',
            'newPassword'=> 'required|confirmed|min:6',
            'password'=> 'required|min:6',
        ]);

        if($request->imagen){
            $imagen=$request->file('imagen');
            $nombreimagen=Str::uuid().".".$imagen->extension();
            $imagenServidor=Image::make($imagen);
            $imagenServidor->fit(1000,1000);
            $imagePath=public_path('perfiles').'/'.$nombreimagen;
            $imagenServidor->save($imagePath);
        }
        if (!Hash::check($request->password, auth()->user()->password)) 
        {
            return back()->with('mensaje','La contraseña Anterior no es correcta');
        }
        
        //Guarda cambios
        $usuario= User::find(auth()->user()->id);
        $usuario->username= $request->username;
        $usuario->imagen=$nombreimagen?? auth()->user()->imagen?? null;
        $usuario->email= $request->email;
        $usuario->password=Hash::make($request->newPassword);
        $usuario->save();
        // redireccionar
        return redirect()->route('post.index', $usuario->username);
    }
}
