@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update', $post->idpost) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" id="content" name="content">{{ old('content', $post->content) }}</textarea>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="datetime-local" class="form-control" id="date" name="date"
                value="{{ old('date', \Carbon\Carbon::parse($post->date)->format('Y-m-d\TH:i')) }}">
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ Auth::user()->username }}"
                readonly>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection