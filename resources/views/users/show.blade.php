@extends('layouts.app')

@section('content')

<div><h5>User Name = {{$user->name}} </h5></div>
<div><h5>User email = {{$user->email}}</h5></div>
<div>
    <a href="{{url('users/'.$user->id.'/edit')}}" class="btn btn-primary">Edit</a>
</div>

@endsection