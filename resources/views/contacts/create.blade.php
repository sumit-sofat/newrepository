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
                        <form  id="myForm" enctype = "multipart/form-data">
                            @csrf 
                                <div class="form-group mb-3">
                                    <label>First Name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{old('first_name')}}">
                                    <span class="text-danger" id="fnameError"></span>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{old('last_name')}}">
                                    <span class="text-danger" id="lnameError"></span>
                                    @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Mobile No.</label>
                                    <input type="number" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{old('mobile_number')}}">
                                    <span class="text-danger" id="phoneError"></span>
                                    
                                    @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Address</label>
                                    <textarea  class="form-control @error('address') is-invalid @enderror" name="address" >{{old('address')}}</textarea>
                                    <span class="text-danger" id="addressError"></span>
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
                                    
                                    <button type="button" class="btn btn-primary" id="submitForm">Submit</button>
                                </div>
</form>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            $("#submitForm").click(function(e) {
                e.preventDefault();
                var formData = $(this).closest('form').serialize();
                $.ajax({
                    type: "POST",
                    url: "{{route('form.submit')}}",
                    data: formData,
                    success: function(response, status){
                        
                        window.location.href = "{{url('contacts')}}";
                    },
                    error:function(error, status){
                        console.log(error.responseJSON.errors)
                        
                        if(error.responseJSON.errors.first_name) {
                            $('#fnameError').text(error.responseJSON.errors.first_name[0])
                        }

                        if(error.responseJSON.errors.last_name) 
                        {
                            $('#lnameError').text(error.responseJSON.errors.last_name[0])
                        }

                        if(error.responseJSON.errors.mobile_number)
                        {
                            $('#phoneError').text(error.responseJSON.errors.mobile_number[0])
                        }
                        if(error.responseJSON.errors.address)
                        {
                            $('#addressError').text(error.responseJSON.errors.address[0])
                        }
                    }
                                       
                });
            });
        </script>
    </div>
@endsection
