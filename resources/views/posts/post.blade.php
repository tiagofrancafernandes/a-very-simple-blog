@extends('layouts.app')

@section('content')
    <article class="blog-post">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
        <p class="blog-post-meta">{{ $post->created_at->diffForHumans() }}, by <a href="#">Chris</a></p>

        <div class="card-text">
            {!! html_entity_decode($post->content) !!}
        </div>
    </article>
@endsection
