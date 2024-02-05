@extends('layout.master')

@section('title') make new profile @endsection

@section('content')

<form method="POST" action="{{route('profile.save', $user_id)}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">profile picture</label>
            <input type="text" class="form-control" name="picture">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">About</label>
            <input type="text" class="form-control" name="about">
        </div>
        <button type="submit" class="btn btn-primary">Make Profile</button>
    </form>

@endsection