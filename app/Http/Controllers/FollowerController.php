<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(User $user, Request $request){
        // dd($user->username);

        $user->followers()->attach(auth()->user()->id);

        return back();


    }

    public function destroy(User $user){
        $user->followers()->detach(auth()->user()->id);

        return back();
    }
}