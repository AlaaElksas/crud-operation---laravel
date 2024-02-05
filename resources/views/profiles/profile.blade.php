@extends('layout.master')

@section('title') user profile @endsection

@section('content')
@if(isset($user->profile))
    <br>
    <br>
    <h3>Profile Data</h3>
    {{ $user->profile->picture }} - {{ $user->profile->about }}
    @else 
    <br>
    <br>
    <h3>This User has no profile</h3>
    <br>
    <a href="{{ route('profile.make', $user->id)}} ">Make Profile</a>
@endif
@endsection