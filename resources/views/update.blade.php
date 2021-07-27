@extends('layouts.app')

@section('content')

<script>
$(document).ready(function(){

    $("#loginform").submit(function(){

        var user=$("#username").val();
        var mail=$("#usermail").val();
        if (user=="") {
            $("#error1").text("Name should not blank");
            return false;
        }
        if (mail=="") {
            $("#error2").text("Email should not blank");
            return false;
        }
        else {
            $("#error").text("");
            return true;
        }
    });
});
</script>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Your Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update' , Auth::user()->id) }}"  id="loginform">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control " name="name" value="{{Auth::user()->name}}" autofocus>
                                <div><span id="error1" style="color:red;"></span></div>
                             </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="usermail" type="email" class="form-control" name="email" value="{{Auth::user()->email}}"   >
                                <div><span id="error2" style="color:red;"></span></div>
                            </div>
                            
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Your Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
