@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Show Account</h1>
    <div class="form-group">
        <strong>Username:</strong>
        {{ $account->username }}
    </div>
    <div class="form-group">
        <strong>Name:</strong>
        {{ $account->name }}
    </div>
    <div class="form-group">
        <strong>Role:</strong>
        {{ $account->role }}
    </div>
    <a class="btn btn-primary" href="/akun">Back</a>
</div>
@endsection