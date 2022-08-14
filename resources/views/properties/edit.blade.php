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
        <h1 class="h3 mb-0 text-gray-800">Edit Properties</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('propertiess') }}">Properties</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Properties</li>
        </ol>
    </div>
    <!-- creating  -->
    <div class="col-xl-12 col-lg-12 mb-4 pl-0">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Properties</h6>
                <a class="m-0 float-right btn btn-primary btn-sm" href="{{ url('shareholders') }}">Back <i
                        class="fas fa-chevron-right"></i></a>
            </div>
            <div id="propertiesEdit" class="col-md-8 offset-lg-2 py-5">
                @if($message =  session('message'))
                <div class="alert alert-success">{{ $message }}</div>
            @endif
            
            <form id="properties" action="{{ route('properties.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-6">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="pronvice_id">Pronvices</label>
                                <select name="pronvice_id" class="form-control" id="pronvice_id">
                                    <option default disabled selected>Select pronvices</option>
                                    @foreach($pronvices as $lists)
                                        <option value="{{ $lists->id }}">
                                            {{ $lists->name}}
                                        </option>
                                    @endforeach
                                </select>

                                @error('pronvice_id')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text"  class="form-control @error('name') is-invalid @enderror"
                                        id="name" placeholder="Enter Name of the property*" value="{{ $property->name }}">
                                @error('name')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="websit_link">Website Link</label>
                                <input name="website_link" type="text"  class="form-control @error('website_link') is-invalid @enderror"
                                        id="website_link" placeholder="Enter website_link*" value="{{ $property->website_link }}">
                                @error('website_link')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input name="description" type="text"  class="form-control @error('description') is-invalid @enderror"
                                        id="description" placeholder="Enter description*" value="{{ $property->description }}">
                                @error('description')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <img src="{{ asset('cover_images/'.$property->cover_image) }}"  height="300" width="100%"  />
                                <label for="cover_image">Cover Image</label>
                                <input type="file" value="{{ old('cover_image') }}" class="form-control @error('cover_image') is-invalid @enderror" 
                                        name="cover_image" id="cover_image">
                                @error('cover_image')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-lg-12">

                    <button type="submit" id="form-submit" class="btn btn-primary btn-block">Submit</button>

                </div>

            </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="viewPresentation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
        <div class="modal-dialog mw-100 w-50" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">View Image/PDF</h5>
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










