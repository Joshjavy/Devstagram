@extends('layouts.app')
@section('titulo')
Registrate en DevStagram
@endsection
@section('contenido')
<div class="md:flex md:justify-center md:gap-4 md:items-center">
    <div class="md:w-9/12">
        <img src="{{asset('img/registrar.jpg')}}" alt="" srcset="">
    </div>
    <div class="md:w-9/12 bg-white p-6 rounded-lg shadow-sm p-5">
        <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="name"  class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input
                    type="text"
                    name="name"
                    id="name"
                    placeholder="Tu nombre"
                    class="border p-3 rounded-xl w-full @error('name') border-red-500 @enderror"
                    value="{{ old('name') }}"
                    />
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm mt-4 p-2 text-center">
                            {{ $message }}
                        </p> 
                    @enderror
        </div>
            
        <div class="mb-5">
                <label for="username"  class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input
                    type="text"
                    name="username"
                    id="username"
                    placeholder="UserName"
                    class="border p-3 rounded-xl w-full @error('username') border-red-500 @enderror"
                    value="{{ old('username') }}"
                    />
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm mt-4 p-2 text-center">
                            {{ $message }}
                        </p> 
                    @enderror
        </div>
        <div class="mb-5">
                <label for="email"  class="mb-2 block uppercase text-gray-500 font-bold">E-mail</label>
                    <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Email"
                    class="border p-3 rounded-xl w-full @error('email') border-red-500 @enderror"
                    value="{{ old('email') }}"
                    />
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm mt-4 p-2 text-center">
                            {{ $message }}
                        </p> 
                    @enderror
        </div>

        <div class="mb-5">
                <label for="password"  class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="password"
                    class="border p-3 rounded-xl w-full @error('paswword') border-red-500 @enderror"
                    />
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm mt-4 p-2 text-center">
                            {{ $message }}
                        </p> 
                    @enderror
        </div>

        <div class="mb-5">
                <label for="password_confirmation"  class="mb-2 block uppercase text-gray-500 font-bold">Repetir Password</label>
                    <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    placeholder="Confirma tu password"
                    class="border p-3 rounded-xl w-full @error('password_confirmation') border-red-500 @enderror"
                    />
                    @error('password_confirmation')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm mt-4 p-2 text-center">
                            {{ $message }}
                        </p> 
                    @enderror
        </div>
        <input type="submit"
        value="crear cuenta"
        class="bg-sky-700 hover:bg-sky-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg "
        >
        </form>
    </div>
</div>
@endsection
