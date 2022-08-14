
@extends('backend.app')

@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css"
          integrity="sha512-hievggED+/IcfxhYRSr4Auo1jbiOczpqpLZwfTVL/6hFACdbI3WQ8S9NCX50gsM9QVE+zLk/8wb9TlgriFbX+Q=="
          crossorigin="anonymous" referrercreditRating="no-referrer" />


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
        <h1 class="h3 mb-0 text-gray-800">Edit Credit Rating</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dmtn/Credit Rating') }}">Credit Rating</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Credit Rating</li>
        </ol>
    </div>
    <!-- creating  -->
    <div class="col-xl-12 col-lg-12 mb-4 pl-0">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Credit Rating</h6>
                <a class="m-0 float-right btn btn-primary btn-sm" href="{{ url('dmtns/credit_ratings') }}">Back <i
                        class="fas fa-chevron-right"></i></a>
            </div>
            <div id="creditRatingEdit" class="col-md-7 offset-lg-2 py-5">
                @if($message =  session('message'))
                <div class="alert alert-success">{{ $message }}</div>
            @endif
            <form id="creditRating" action="" method="post" enctype="multipart/form-data">
                @csrf

                    <div class="row">
                        <div class="col-lg-6">
                            

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input name="name" type="text"  class="form-control @error('name') is-invalid @enderror"
                                            id="name" placeholder="Enter PDF Name*" value="{{ $creditRating->name }}">
                                    @error('name')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">

                            <div class="col">
                                <div class="form-group">
                                    <iframe src="{{ asset('pdf_files/'.$creditRating->pdf) }}"  height="200" width="100%" ></iframe>
                                    <label for="upload">Upload PDF</label>
                                    <input type="file" value="{{ $creditRating->pdf }}" class="form-control @error('upload') is-invalid @enderror" name="upload" id="upload">
                                    @error('upload')
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




@endsection

