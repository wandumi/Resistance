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
        <h1 class="h3 mb-0 text-gray-800">All Presentations Sections </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Presentations Sections </li>
        </ol>
    </div>
    <!-- Invoice Example -->
    <div class="col-xl-12 col-lg-12 mb-4 pl-0">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">All Presentations Sections </h6>
                <a class="m-0 float-right btn btn-primary btn-sm" href="{{ url('presentations/presentation_sections/create') }}">Add New <i
                        class="fas fa-chevron-right"></i></a>
            </div>
            <div class="table-responsive" id="bbbeeTable">
                @if($sections)
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($sections as $section)
                            <tr>
                                <td>
                                    {{ $section->name }}
                                </td>
                          
                                <td>
                                 
                                    <a class="btn btn-sm btn-info" id="showEdit" href="{{ url('presentations/presentation_sections/'.$section->id.'/edit') }}" data-sectionEdit="{{ $section->id }}">Edit</a>

                                    <a class="btn btn-sm btn-danger" id="sectionDelete" href="javascript:void(0);" data-section-delete="{{ $section->id }}">Delete</a>

                                    

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



@section('content')
    <div class="container">
        <div class="row justify-content-center">
        
            <div class="col-xl-12 col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary"></h5>
                        <a class="m-0 float-right btn btn-primary btn-sm" href="">Add New <i
                                class="fas fa-chevron-right"></i></a>
                    </div>
                    <div class="table-responsive" id="financialTable">
                        
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        
        </div>
    </div>
@endsection


