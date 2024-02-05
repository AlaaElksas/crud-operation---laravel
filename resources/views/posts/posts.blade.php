@extends('layout.master')

@section('title') user posts @endsection

@section('content')

    <br>
    <br>
    <h3>Posts Tabel</h3>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">post_description</th>
                <th scope="col">user_id</th>
                <th scope="col">#</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($user->posts))
        @foreach($user->posts as $post)
            <tr>
                <th scope="row">{{ $post['id'] }}</th>
                <td>{{ $post['post_description'] }}</td>
                <td>{{ $post['user_id'] }}</td>
                <td><a href="{{ url('/') }}/editPost/{{ $post['user_id'] }}/{{ $post['id'] }}">Edit post</a></td>
                <td><a href="{{ url('/') }}/deletePost/{{ $post['user_id'] }}/{{ $post['id'] }}">Delete post</a></td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>

    <a href="{{ url('/') }}/addPost/{{ $user->id }}"><button style="">Add Post</button></a>
    <br>
    <br>
    <br>

@endsection