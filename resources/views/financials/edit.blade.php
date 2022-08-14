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
        <h1 class="h3 mb-0 text-gray-800">Edit Financials</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('financials/financial') }}">Financials</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Financials</li>
        </ol>
    </div>
    <!-- creating  -->
    <div class="col-xl-12 col-lg-12 mb-4 pl-0">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Financial</h6>
                <a class="m-0 float-right btn btn-primary btn-sm" href="{{ url('financials/financial') }}">Back <i
                        class="fas fa-chevron-right"></i></a>
            </div>
            <div id="financialEdit" class="col-md-8 offset-lg-2 py-5">
                @if($message =  session('message'))
                    <div class="alert alert-success">{{ $message }}</div>
                @endif
                <form id="financialSection" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="financial_section_id">Financial Lists</label>
                                    <select name="financial_section_id" class="form-control" id="financial_section_id">
                                        <option default disabled selected>Select Financial Lists</option>
                                        @foreach($financial as $lists)
                                            {{-- {{ dd($lists ) }} --}}
                                            {{-- <option value="" 
                                                @if($financial->financial_section->name) selected @endif>
                                                {{ $lists->name }}
                                            </option> --}}
                                        @endforeach
                                    </select>

                                    @error('financial_section_id')
                                        <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>




                            <div class="col-lg-6">

                                <div class="form-group">
                                    {{-- <img src="{{ asset('pdf_files/'.$financial->upload) }}"  height="300" width="100%"  /> --}}
                                    <iframe src="{{ asset('pdf_files/'.$financial->pdf) }}"  height="300" width="100%" ></iframe>
                                    <label for="upload">Upload PDF</label>
                                    <input type="file" value="{{ $financial->pdf }}" class="form-control @error('upload') is-invalid @enderror" name="upload" id="upload">
                                    @error('upload')
                                        <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div style="height:40px; width:100%;">

                                </div>
                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <img src="{{ asset('cover_images/'.$financial->cover_image) }}"  height="300" width="100%"  />
                                    <label for="cover_image">Upload Cover Image</label>
                                    <input type="file" value="{{ $financial->cover_image }}" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" id="cover_image">
                                    @error('cover_image')
                                        <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div style="height:40px; width:100%;">

                                </div>
                            </div>
                            </div>





                            <div class="col-lg-12">

                                <button type="submit" id="form-submit" class="btn btn-primary btn-block">Submit</button>

                            </div>
                        </div>
                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="viewfinancial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
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


@section('footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#financialTable').on('click','#showImage', function (){
                var financialId = $(this).data('financial');
                $.ajax({
                    type: "GET",
                    url: "financial/" + financialId,
                    success: function(result) {
                        console.log(result);
                        $('#viewOresentation').modal('show');
                        var image = '<img class="image" src="/logos/'+ result.logo +'" width="100%" height="90%" />';
                        $(image).insertAfter('.row:last');
                    }
                });
            });
            // remove the image from the modal
            $('#viewfinancial').on('hidden.bs.modal', function(){ //hidden.bs.modal
                $('.image').remove();
            });
            //delete
            $('#financialTable').on('click','#financialDelete', function (){
                var financialDelete = $(this).data('financial-delete');
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    type: "DELETE",
                    url: "financial/" + financialDelete,
                    data: {
                        "id": financialDelete,
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
