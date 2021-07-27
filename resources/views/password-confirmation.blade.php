@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Hello')  }} {{Auth::user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You Password has been updated. Please Login again...') }}
                    
                    
                </div>
                
                <!-- <div class="card-body">
                     <a href="{{ route('view')}}" class="btn btn-primary">View Your Profile</a>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
