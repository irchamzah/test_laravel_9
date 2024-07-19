@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
        </ol>
    </nav>

    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <small>Posted by {{ $post->username }} on {{ $post->date }}</small>

    <!-- Update and Delete Buttons -->
    @if (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->username ===
    $post->username))
    <div class="mt-3">
        <a class="btn btn-primary" href="{{ route('posts.edit', $post->idpost) }}">Update</a>

        <form action="{{ route('posts.destroy', $post->idpost) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
    @endif
</div>
@endsection