@extends('layouts.app')
@section('titulo')
Crear Publicación
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-8/12 px-10 bg-white  rounded-lg shadow-sm p-5">
            
            <form action="{{route('imagenes.store')}}"
            method="POST"
            enctype="multipart/form-data"
            id="dropzone" class="dropzone border-dashed boder-2 w-full h-96 rounded flex flex-col justify-center items-center">
            @csrf

            </form>
        
        </div>

        <div class="md:w-8/12 px-10 bg-white  rounded-lg shadow-sm p-5"> 
        
            <form action="{{route('posts.store')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="titulo"  class="mb-2 block uppercase text-gray-500 font-bold">TÍtulo</label>
                        <input
                        type="text"
                        name="titulo"
                        id="titulo"
                        placeholder="Título de la publicación"
                        class="border p-3 rounded-xl w-full @error('titulo') border-red-500 @enderror"
                        value="{{ old('titulo') }}"
                        />
                        @error('titulo')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm mt-4 p-2 text-center">
                                {{ $message }}
                            </p> 
                        @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion"  class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
                    <textarea name="descripcion"
                    id="descripcion"
                    placeholder="Descripción de la publicación"
                    class="border p-3 rounded-xl w-full @error('descripcion') border-red-500 @enderror"
                    >{{ old('descripcion') }}</textarea>
                        
                        
                        
                        @error('descripcion')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm mt-4 p-2 text-center">
                                {{ $message }}
                            </p> 
                        @enderror
                </div>
                <div class="mb-5">
                    <input type="hidden" name="imagen" value="{{ old('imagen')}}">
                </div>

                <input type="submit"
                value="crear publicación"
                class="bg-sky-700 hover:bg-sky-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg "
                >
            </form>
        
        </div>

    </div>
@endsection