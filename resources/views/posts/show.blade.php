@extends('layouts.app')
@section('titulo')
    {{ $post->titulo }}
@endsection


@section('contenido')
    <div class="container w-4/5	 mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}" class="h-auto max-w-full" />
            <div class="p-3 flex items-center gap-4">
                @auth
                
                <livewire:like-post :post="$post"/>
                    
                @endauth

                

            </div>
            <div>
                <p class="font-bold"> {{ $post->user->username }}</p>
                <p> {{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->descripcion }}</p>
            </div>
            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="bg-red-500 hover:bg-red-600 p-2 text-white font-bold mt-5"
                            value="Eliminar publicacion">
                    </form>
                @endif
            @endauth


        </div>
        <div class="md:w-1/2">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                    <p class="text-xl font-bold text-center mb-4">
                        Agrega un Nuevo Comentario
                    </p>
                    @if (session('mensaje'))
                        <div class="bg-green-500 p-2 rounded-lg- mb-6 text-white text-center uppercase font-bold">
                            {{ session('mensaje') }}
                        </div>
                    @endif


                    <form action="{{ route('comentario.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="Comentario" class="mb-2 block uppercase text-gray-500 font-bold">Comentario</label>
                            <textarea name="Comentario" id="descripcion" placeholder="Agregar Comentario"
                                class="border p-3 rounded-xl w-full @error('comentario') border-red-500 @enderror"> </textarea>
                            @error('comentario')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm mt-4 p-2 text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <input type="submit" value="Comentar"
                            class="bg-sky-700 hover:bg-sky-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg ">

                    </form>
                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 boder-b">
                                <a
                                    href="{{ route('post.index', $comentario->user->username) }}">{{ $comentario->user->username }}</a>
                                <p> {{ $comentario->comentario }} </p>
                                <p class=""> {{ $comentario->created_at->diffForHumans() }} </p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center"> No hay comentarios aún.</p>
                    @endif
                </div>





            </div>
        </div>
    </div>
@endsection
