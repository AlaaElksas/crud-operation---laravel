@extends('layout.master')

@section('title') add new post @endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<br>
<br>
    <form method="POST" action="{{ url('/') }}/postStore">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Add Post</label>
            <input type="text" class="form-control" name="post_description">
            <input type="hidden" value="{{ $user_id }}" name="user_id">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection