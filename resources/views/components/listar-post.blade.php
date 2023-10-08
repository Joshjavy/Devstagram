<div>
    
    @if ($posts->count())

    <div class="grid md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-6">
        @foreach ($posts as $post)
            <div>
                <a href="{{route('post.show',['post'=>$post,'user'=>$post->user])}}">
                    <img src="{{ asset('uploads').'/'.$post->imagen}}" alt="imagen del post {{ $post->titulo}}"/>
                </a>
            </div>
            
        @endforeach
    </div>
    
    <div class="my-2">{{ $posts->links('pagination::tailwind')}}</div>
    
        @else
        <p class="text-center">no hay posts, sigue a alguien para ver su post</p>
    @endif
</div>