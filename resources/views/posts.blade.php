<x-layout>
  
    <x-slot name="content">
        @foreach ($posts as $post)
            <article>
                <h1> 
                    <a href="/posts/{{$post->id}}">
                        {{$post->title }}
                    </a> 
                </h1> 
                {{-- * ->category returns category asscoiated with post, then we can access columns of category --}}
                <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
                <div> {!! $post->excerpt !!}</div>
            </article>
    
        @endforeach
    </x-slot>

</x-layout>
