<x-layout>

<x-slot name="content">
    <article>

        {{-- This page is a template, blog post will be provided from wildcard in route --}}
        <h1> {{$post->title}}</h1> 
        <p>By: <a href="#">{{$post->user->name}}</a></p> <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        <div> {!! $post->body !!}</div>

    </article>

    <a href="/">Go Home</a>

</x-slot>

</x-layout>