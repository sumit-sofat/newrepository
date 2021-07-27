@extends('layouts.adminApp')

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

                   <p style="color:green;"> {{ __('You are logged in Admin Home!') }}</p>
                    
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
