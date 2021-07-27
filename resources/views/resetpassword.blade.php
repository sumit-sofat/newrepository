@extends('layouts.app')

@section('content')
<script>
        $(document).ready(function(){

            $("#loginform").submit(function(){

                var password=$("#pwd").val();
                var confirmpassword=$("#confpwd").val();
                if (password==confirmpassword) {
                    $("#error").text("");
                    return true;
                }
                else {
                    $("#error").text("Passwords do not match");
                    return false;
                }
            });
        });
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Your Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('resetpassword' , Auth::user()->id) }}"  id="loginform">
                        @csrf
                        
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="pwd" type="password" class="form-control " name="password" required autocomplete="new-password">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="confpwd" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <div><span id="error" style="color:red;"></span></div>
                            </div>
                            <div><span id="error" style="color:red;"></span></div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Your Password') }}
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