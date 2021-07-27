@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View Profile') }}</div>

                <div class="card-body">
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>Action</th>
                                    
                                        
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <tr>
                                        <td>{{Auth::user()->name}}</td>
                                        <td>{{Auth::user()->email}}</td>
                                        
                                        <td><a href="{{route('update',Auth::user()->id) }}">Edit</a></td>
                                        
                                    </tr>
                                   
                                            </tbody>
                                            <tfoot>
                                            
                                    </tfoot>
                                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
