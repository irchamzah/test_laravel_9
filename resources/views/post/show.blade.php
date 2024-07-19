@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <small>Posted by {{ $post->username }} on {{ $post->date }}</small>
</div>
@endsection