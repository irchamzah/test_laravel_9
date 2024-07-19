@extends('layouts.app')

@section('content')
<div class="container">
    <h1></h1>
    @if ($posts->isEmpty())
    <p>No posts available.</p>
    @else
    <div class="">
        @foreach ($posts as $post)
        <a href="{{ route('posts.show', $post->idpost) }}" class="list-group-item ">
            <h1 class="mb-1">{{ $post->title }}</h1>
            <small>{{$post->username}} - {{ $post->created_at->format('d M Y') }}</small>
            <p class="mb-1">{{ Str::limit($post->content, 150) }}</p>
            <hr>
        </a>
        @endforeach
    </div>
    @endif
</div>
@endsection