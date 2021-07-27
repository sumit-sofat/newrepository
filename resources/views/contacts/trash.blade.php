@extends('layouts.app')
@section('content')
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">

     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("first_name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

</script>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                    <h5 class="alert alert-warning">{{session('status')}}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>  Trashed Contacts
                            <a href="{{url('contacts ')}}" class= "btn btn-danger float-end">Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Mobile Number</th>
                                    <th>Address</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr>
                                    <td>{{$contact->first_name}}</td>
                                    <td>{{$contact->last_name}}</td>
                                    <td>{{$contact->mobile_number}}</td>
                                    <td>{{$contact->address}}</td>
                                    <td>
                                        <!-- <a href="{{route('contacts.show',$contact->id)}}" >Show/</a> -->
                                        <a href="{{route('contacts.restore', $contact->id)}}" >Restore/</a>
                                        <form action="{{route('force.delete',$contact->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class= "btn btn-primary show_confirm">Delete Permanently</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">

        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
                event.preventDefault();
            swal({
                title: `Are you sure you want to delete this contact?`,
                text: "If you delete this, it will be gone forever.",
                //   icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                form.submit();
                }
            });
        });

    </script>
@endsection
