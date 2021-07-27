@extends('layouts.app')

@section('content')

<div><h5>User Name = {{$user->name}}</h5></div>
<div><h5>User email = {{$user->email}}</h5></div>

@endsection