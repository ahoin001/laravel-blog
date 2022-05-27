{{-- Use layout view --}}
@extends ('layout')

@section('heading')
<h1>My Blog</h1>
@endsection

{{-- where to place in layout view --}}
@section('content')

    @foreach ($posts as $post)
        <article>
            <h1> 
                <a href="/posts/{{$post->slug}}">
                    {{$post->title }}
                </a> 
            </h1> 
            <div> {{$post->excerpt}}</div>
        </article>
    @endforeach
   
@endsection