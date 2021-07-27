@extends('layouts.app')
@section('content')

<div>
    <h1>Show Contact Details</h1>
    <span><a href="{{route('contacts.index')}}" class="btn btn danger">Back</a></span>
</div>
<div class="container">
    <label> Name</label>
    <h4>{{$contact->first_name}} {{$contact->last_name}}</h4>
    <hr>

    <label>Mobile Number</label>
    <h4>{{$contact->mobile_number}}</h4>
    <hr>

    <label>Address</label>
    <h4>{{$contact->address}}</h4>
    <hr>
</div>
@endsection