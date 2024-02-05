@extends('layout.master')

@section('title') edit post @endsection

@section('content') 

<br>
<br>
    <form method="POST" action="{{ url('/') }}/postSave" >
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Edit Post</label>
            <input type="text" class="form-control" name="post_description">
            <input type="hidden" value="{{ $post_id }}" name="post_id">
            <input type="hidden" value="{{  $user_id }}" name="user_id">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>

    @endsection