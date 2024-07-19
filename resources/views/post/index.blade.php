@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
    <br><br>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Content</th>
            <th>Date</th>
            <th>Username</th>
            <th width="280px">Action</th>
        </tr>
        @php
        $i = 0;
        @endphp
        @foreach ($posts as $post)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td>{{ $post->date }}</td>
            <td>{{ $post->username }}</td>
            <td>
                <form action="{{ route('posts.destroy',$post->idpost) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('posts.show',$post->idpost) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->idpost) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection