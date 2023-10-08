@extends('layouts.app')
@section('titulo')
Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{ route('perfil.store')}}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf

                @if (session('mensaje'))
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm mt-4 p-2 text-center">
                            {{ session('mensaje') }}
                        </p> 
                @endif
                <div class="mb-5">
                    <label for="username"  class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                        <input
                        type="text"
                        name="username"
                        id="username"
                        placeholder="username"
                        class="border p-3 rounded-xl w-full @error('username') border-red-500 @enderror"
                        value="{{ auth()->user()->username }}"
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
                        value="{{ auth()->user()->email }}"
                        />
                        @error('email')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm mt-4 p-2 text-center">
                                {{ $message }}
                            </p> 
                        @enderror
            </div>
            
            <div class="mb-5">
                <label for="password"  class="mb-2 block uppercase text-gray-500 font-bold">Password Anterior</label>
                    <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Contraseña Anterior"
                    class="border p-3 rounded-xl w-full @error('password') border-red-500 @enderror"
                    />
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm mt-4 p-2 text-center">
                            {{ $message }}
                        </p> 
                    @enderror
        </div>

            <div class="mb-5">
                    <label for="newPassword"  class="mb-2 block uppercase text-gray-500 font-bold">Nuevo Password</label>
                        <input
                        type="password"
                        name="newPassword"
                        id="newPassword"
                        placeholder="newPassword"
                        class="border p-3 rounded-xl w-full @error('paswword') border-red-500 @enderror"
                        />
                        @error('newPassword')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm mt-4 p-2 text-center">
                                {{ $message }}
                            </p> 
                        @enderror
            </div>
    
            <div class="mb-5">
                    <label for="newPassword_confirmation"  class="mb-2 block uppercase text-gray-500 font-bold">Repetir newPassword</label>
                        <input
                        type="password"
                        name="newPassword_confirmation"
                        id="newPassword_confirmation"
                        placeholder="Confirma tu newPassword"
                        class="border p-3 rounded-xl w-full @error('newPassword_confirmation') border-red-500 @enderror"
                        />
                        @error('newPassword_confirmation')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm mt-4 p-2 text-center">
                                {{ $message }}
                            </p> 
                        @enderror
            </div>

                

                <div class="mb-5">
                    <label for="imagen"  class="mb-2 block uppercase text-gray-500 font-bold">
                        Imagen perfil:
                    </label>
                        <input
                        type="file"
                        name="imagen"
                        id="imagen"
                        placeholder="imagen"
                        class="border p-3 w-full rounded-xl"
                        accept=".jpg,.jpeg, .png,.avif"
                        />
                </div>


                <input type="submit"
                value="guardar cambios"
                class="bg-sky-700 hover:bg-sky-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg "
                >
            </form>
        </div>
    </div>
@endsection