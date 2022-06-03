<x-layout>

<x-slot name="content">
    <article>

        {{-- This page is a template, blog post will be provided from wildcard in route --}}
        <h1> {{$post->title}}</h1> 
        <div> {!! $post->body !!}</div>

    </article>

    <a href="/">Go Home</a>

</x-slot>

</x-layout>