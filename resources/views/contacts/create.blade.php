@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4> Add Contact
                            <a href="{{url('contacts ')}}" class= "btn btn-danger">Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{url('contacts')}}" method="POST" enctype="multipart/form-data">
                            @csrf 
                                <div class="form-group mb-3">
                                    <label>First Name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{old('first_name')}}">
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{old('last_name')}}">
                                    @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Mobile No.</label>
                                    <input type="number" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{old('mobile_number')}}">
                                    
                                    @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Address</label>
                                    <textarea  class="form-control @error('address') is-invalid @enderror" name="address" >{{old('address')}}</textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" >{{old('address')}}</input>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    
                                    <button type="submit" class="btn btn-primary" >Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
