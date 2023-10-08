<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class RegisterController extends Controller
{
    //
    public function index()
    {
         return view('auth.register');
    }
    public function store(Request $request){

        $request->request->add(['username'=>str::slug($request->username)]);
        $this->validate($request,[
            'name'=>'required|min:3|max:20',
            'username'=>'required|unique:users|min:3|max:20',
            'email'=>'required|unique:users|email|max:60',
            'password'=> 'required|confirmed|min:6',
            
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
            'username'=>$request->username,
        ]);

        auth()->attempt($request->only('email','password'));
        
        //Redireccionar
        return redirect()->route('post.index');
    }
}
