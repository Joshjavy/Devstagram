<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',HomeController::class)->name('home');

Route::get('/crear-cuenta',[RegisterController::class,'index'])->name('register');
Route::post('/crear-cuenta',[RegisterController::class,'store']);

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store'])->name('login');

//Rutas para el perfil
Route::get('/editar-perfil',[PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil',[PerfilController::class, 'store'])->name('perfil.store');

//Salir
Route::post('logout',[LogoutController::class,'store'])->name('logout');


Route::get('/{user:username}',[PostController::class,'index'])->name('post.index');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}',[PostController::class,'show'])->name('post.show');
Route::post('/{user:username}/posts/{post}',[ComentarioController::class,'store'])->name('comentario.store');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('post.destroy');

Route::post('/imagenes',[ImagenController::class,'store'])->name('imagenes.store');

// likes a la fotos

Route::post('/post/{post}/likes',[LikeController::class,'store'])->name('posts.likes.store');
Route::delete('/post/{post}/likes',[LikeController::class,'destroy'])->name('posts.likes.destroy');

//Seguiendo a usuarios
Route::post('/{user:username}/follow',[FollowerController::class,'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow',[FollowerController::class,'destroy'])->name('users.unfollow');