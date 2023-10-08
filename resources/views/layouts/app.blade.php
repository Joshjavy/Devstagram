<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>DevStagram - @yield('titulo')</title>
        
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
        @stack('styles')
        {{-- @vite('resources/css/app.css') --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <a href="{{ route('home')}}">
                    <h1 class="text-3xl font-black"> DevStagram</h1>
                </a>
                <nav>
                    @auth
                    <form action="{{ route('logout')}}" method="POST">
                        <a href="{{ route('posts.create') }}" class="bg-white  p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer" >
                            
                            Crear
                        </a>
                        <a class="font-bold  text-gray-600 text-sm"
                        href="{{route('post.index',auth()->user()->username)}}">
                            Hola: <span>
                                {{ auth()->user()->username }}</span>
                        </a>
                        
                        <button class="font-bold uppercase text-gray-600 text-sm" type="submit">
                            Cerrar Sesión
                        </button>
                            @csrf
                        </form>
                        
                    @endauth

                    @guest
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login')}}">Login</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('register')}}"> Crear Cuenta</a>    
                    @endguest
                    
                </nav>

            </div>
        </header>
    <main class="mx-auto container mt-10">
        <h2 class="font-black text-center text-3xl mb-10"> @yield('titulo') </h2>
        @yield('contenido')
    </main>
    <footer class="text-center p-5 text-gray-500 font-bold uppercase p-5">
        DevStagram - Todos los derecho reservados {{ now()->year }}
    </footer>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireScripts
    </body>
 </html>