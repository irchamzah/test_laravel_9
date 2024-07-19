@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Accounts</h1>
    <a href="{{ route('akun.create') }}" class="btn btn-primary">Create New Account</a>
    <br><br>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Username</th>
            <th>Name</th>
            <th>Role</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($accounts as $account)
        <tr>
            <td>{{ $account->username }}</td>
            <td>{{ $account->name }}</td>
            <td>{{ $account->role }}</td>
            <td>
                <form action="{{ route('akun.destroy',$account->username) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('akun.show',$account->username) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('akun.edit',$account->username) }}">Edit</a>
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