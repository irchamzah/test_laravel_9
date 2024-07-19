@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Posts</li>
        </ol>
    </nav>

    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
    <br><br>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <!-- Display pagination information -->
    Menampilkan <span class="fw-bold">{{ $posts->firstItem() }}-{{ $posts->lastItem() }}</span> dari <span
        class="fw-bold">{{ $posts->total() }}</span> item.

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th><a
                        href="{{ route('posts.index', ['sort' => 'title', 'direction' => $sortDirection === 'asc' ? 'desc' : 'asc']) }}">Title</a>
                </th>
                <th><a
                        href="{{ route('posts.index', ['sort' => 'content', 'direction' => $sortDirection === 'asc' ? 'desc' : 'asc']) }}">Content</a>
                </th>
                <th><a
                        href="{{ route('posts.index', ['sort' => 'date', 'direction' => $sortDirection === 'asc' ? 'desc' : 'asc']) }}">Date</a>
                </th>
                <th><a
                        href="{{ route('posts.index', ['sort' => 'username', 'direction' => $sortDirection === 'asc' ? 'desc' : 'asc']) }}">Username</a>
                </th>
                <th width="280px"></th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = $posts->firstItem();
            @endphp
            @foreach ($posts as $post)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $post->title }}</td>
                <td>{!! $post->content !!}</td>
                <td>{{ $post->date }}</td>
                <td>{{ $post->username }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('posts.show', $post->idpost) }}">Show</a>
                    @if (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->username ===
                    $post->username))
                    <a class="btn btn-primary" href="{{ route('posts.edit', $post->idpost) }}">Edit</a>
                    <form action="{{ route('posts.destroy', $post->idpost) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination links -->
    {{ $posts->appends(['sort' => $sortField, 'direction' => $sortDirection])->links() }}
</div>
@endsection