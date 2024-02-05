@extends('layout.master')

@section('title') users table @endsection

@section('content')
    <br>
    <br>
    <h3>Users Tabel</h3>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">phone</th>
                <th scope="col">email</th>
                <th scope="col">#</th>
                <th scope="col">#</th>
                <th scope="col">#</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="{{ url('/') }}/profile/{{ $user->id }}">View Profile</a></td>
                <td><a href="{{ url('/') }}/posts/{{ $user->id }}">View Posts</a></td>
                <td><a href="{{ url('/') }}/editUser/{{ $user->id }}">Edit user data</a></td>
                <td><a onclick="return confirm('Are you sure?')" href="{{ url('/') }}/deleteUser/{{ $user->id }}">Delete User</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{route('User.Add')}}"><button type="button" class="btn btn-primary">Add User</button></a>

@endsection