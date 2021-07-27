@extends('layouts.adminApp')

@section('content')

<div><h5>User Name = {{Auth::user()->name}} {{Auth::user()->last_name}} </h5></div>
<div><h5>User email = {{Auth::user()->email}}</h5></div>
<div>
    <a href="{{route('edit.admin.profile')}}" class="btn btn-primary">Edit</a>
</div>

@endsection
