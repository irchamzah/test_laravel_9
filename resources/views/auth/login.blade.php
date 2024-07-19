@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ url('login') }}">
        @csrf
        <div>
            <label for="username">Username:</label>
            <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus>
            @error('username')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required>
            @error('password')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Login</button>
    </form>
</div>
@endsection