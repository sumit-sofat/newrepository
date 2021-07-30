@extends('layouts.app')

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@endpush
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                    <h5 class="alert alert-warning">{{session('status')}}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4> Contact List
                            <a href="{{route('contacts.create')}}" class= "btn btn-primary ">Add Contact</a>

                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table data-table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Mobile Number</th>
                                    <th>Address</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>

    </div>
        <script type="text/javascript">
            $(function () {

                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('contacts.list') }}",
                    columns: [
                        {data:'profilepic', name: 'profilepic',}, 
                        {data: 'first_name', name: 'first_name'},
                        {data: 'last_name', name: 'last_name'},
                        {data: 'mobile_number', name: 'mobile_number'},
                        {data: 'address', name: 'address'},
                        {data: 'action', name: 'action', orderable: true, searchable: true},
                    ] 
                });

            });
        </script>
@endsection
