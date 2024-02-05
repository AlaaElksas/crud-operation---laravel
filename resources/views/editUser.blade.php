@extends('layout.master')

@section('title') edit user  @endsection

@section('content')

    <form method="POST" action="{{ url('/') }}/saveUser">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="text" class="form-control" name="phone">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="text" class="form-control" name="email">
        </div>
        <input type="hidden" value="{{ $user_id }}" name="user_id">
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection 