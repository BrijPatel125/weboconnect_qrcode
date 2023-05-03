<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Hello {{ auth()->user()->name }}, {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

  
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="card">
                        <div class="card-header">
                            <h2>Simple QR Code</h2>
                        </div>
                        <div class="card-body myqrcode">
                            <p class="mb-2">By scanning the QR Code you will be able to see the logged in user information.</p>
                            <?php
                                $data = [
                                    "First Name : " => auth()->user()->name,
                                    "Last Name : " => auth()->user()->lastname,
                                    "Email : " => auth()->user()->email
                                ];
                            ?>
                            {!! QrCode::size(100)->generate(json_encode($data)) !!}

                            <a href="{{ url('/profile') }}" class="btn btn-success mt-2" alt="Cluck">Click Here..</a>
                            <p class="mt-2"><b>Note : To redirect to profile update page click the button "Click Here..."</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2><b>List Of All Registered Users</b></h2>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body">
                    <table class="table table-bordered" id="datatable-crud">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
   

    
</x-app-layout>
<script type="text/javascript">
    $(document).ready( function () {
      $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $('#datatable-crud').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('users') }}",
        columns: [
        { data: 'id', name: 'id' },
        { data: 'name', name: 'name' },
        { data: 'lastname', name: 'lastname' },
        { data: 'email', name: 'email' },
        ],
        order: [[0, 'desc']]
      });
    });
</script>
<!--  -->
<script>

    $(".myqrcode").click(function(){
        window.location.href = "{{ route('profile.edit')}}";
    });
    
</script>
<!--  -->