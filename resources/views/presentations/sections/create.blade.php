@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">Presentation Section</h5>
                    <a href="{{ url('presentations/presentation_sections') }}" class="btn btn-sm btn-primary">Back</a>
                </div>
                    <div class="col-lg-6 offset-lg-3 my-5">
                        @if($message =  session('message'))
                            <div class="alert alert-success">{{ $message }}</div>
                        @endif
                        <form id="financial" action="{{ url('presentations/presentation_sections') }}" method="post" enctype="multipart/form-data">
                            @csrf
    

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input name="name" type="text"  class="form-control @error('name') is-invalid @enderror"
                                            id="name" placeholder="Enter Presentation display Name*" value="{{ old('name') }}">
                                    @error('name')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-lg-12">
    
                                <button type="submit" id="form-submit" class="btn btn-primary btn-block">Submit</button>
    
                            </div>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

