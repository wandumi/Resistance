@extends('backend.app')

@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css"
          integrity="sha512-hievggED+/IcfxhYRSr4Auo1jbiOczpqpLZwfTVL/6hFACdbI3WQ8S9NCX50gsM9QVE+zLk/8wb9TlgriFbX+Q=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        .modal-dialog,
        .modal-content {
            /* 80% of window height */
            height: 90%;
        }
    </style>

@endsection


@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All B-BBEE</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">B-bbee</li>
        </ol>
    </div>
    <!-- Invoice Example -->
    <div class="col-xl-12 col-lg-12 mb-4 pl-0">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">All B-BBEE</h6>
                <div>
                    <a class="m-0 float-left mr-2 btn btn-info btn-sm" href="{{ url('bbbees_sortable') }}">Sort Bbbee</a>
                    <a class="m-0 float-right btn btn-primary btn-sm" href="{{ url('bbbees/create') }}">Add New <i
                            class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="table-responsive" id="bbbeeTable">
                @if($bbbees)
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>PDFs</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($bbbees as $bbbee)
                        <tr>
                            <td>{{ $bbbee->name }}</td>
                            

                            <td>
                                <iframe src="{{ asset('pdf_files/'.$bbbee->pdf) }}"  height="60" width="100vh" ></iframe>
                            </td>
                            <td>
                               

                                <a class="btn btn-sm btn-info" id="showEdit" href="{{ url('bbbees/'.$bbbee->id.'/edit' ) }}" data-bbbeeEdit="{{ $bbbee->id }}">Edit</a>

                                <a class="btn btn-sm btn-danger" id="bbbeeDelete" href="javascript:void(0);" data-bbbee-delete="{{ $bbbee->id }}">Delete</a>

                            </td>
                        </tr>

                    @endforeach
                    @else
                        <p class="d-flex align-center justify-content-center">There is no data</p>
                    @endif


                    </tbody>
                    <tfoot class="thead-light">
                        
                    </tfoot>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="viewShareholder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
        <div class="modal-dialog mw-100 w-50" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">View Logo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
</div>


@endsection


@section('footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script>
        $(document).ready(function(){
          
            // remove the image from the modal
            $('#viewBbbee').on('hidden.bs.modal', function(){ //hidden.bs.modal
                $('.pdf').remove();
            });

            $('#bbbeeTable').on('click','#bbbeeDelete', function (){

                var bbbeeDelete = $(this).data('bbbee-delete');
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    type: "DELETE",
                    url: "bbbee/" + bbbeeDelete,
                    data: {
                        "id": bbbeeDelete,
                        "_token": token,
                    },
                    success: function(result) {
                        console.log(result);

                        alert('Deleted Successfully');

                        setInterval(() => {
                            location.reload();
                        }, 500);

                    }
                });
            });

            
        });
    </script>

@endsection