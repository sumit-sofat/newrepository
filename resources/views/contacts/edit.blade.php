@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4> Edit Contact
                            <a href="{{route('contacts.index')}}" class= "btn btn-danger">Back</a>
                        </h4>
                    </div>
                   
                    <div class="card-body">
                        <form action="{{route('contacts.update', $contact->id)}}" method="POST">
                            @csrf 
                            @method('PUT')
                                <div class="form-group mb-3">
                                    <label>First Name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{$contact->first_name}}">
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{$contact->last_name}}">
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Mobile No.</label>
                                    <input type="number" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{$contact->mobile_number}}">
                                    @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Address</label>
                                    <textarea  class="form-control  @error('address') is-invalid @enderror" name="address" value="">{{$contact->address}}</textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    
                                    <button type="submit" class="btn btn-primary" >Update</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
