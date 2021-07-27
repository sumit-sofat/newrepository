@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>{{ __('Hello')  }} {{Auth::user()->name}}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                   <p style="color:green;"> {{ __('You are logged in!') }}</p>
                    
                    
                </div>
                
                <!-- <div class="card-body">
                     <a href="{{ route('view')}}" class="btn btn-primary">View Your Profile</a>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
