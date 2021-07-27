@extends('layouts.app')

@section('content')

<div><h5>User Name = {{Auth::user()->name}} {{Auth::user()->last_name}} </h5></div>
<div><h5>User email = {{Auth::user()->email}}</h5></div>
<div>
    <a href="{{route('edit.profile')}}" class="btn btn-primary">Edit</a>
</div>

@endsection
