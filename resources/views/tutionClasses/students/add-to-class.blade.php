@extends('layouts.app') 
@section('content')
<div class="container-fluid">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
             
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Tutions </a></li>
                <li class="breadcrumb-item active">{{ $tution->name }}</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">{{ $tution->name }} Students List at {{ $tution->institute->name }}</h2>
            <div class="card-tools">
              <a href="{{ url()->previous() }}" class="btn bg-gray-dark btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <form action="{{ route('tstudent.save-to-class',$tution->id) }}" method="post">
        <div class="card-body"> 
                
                    @csrf
                    @method('POST')

                    <div class="form-group row">
                        <label for="Search" class="col-md-3">Student ID</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control text-lg @error('student_id') is-invalid @enderror" name="student_id" value="{{ old('student_id') }}" required>
                            @error('student_id')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
               
        </div> 
        <div class="card-footer">
            <input type="submit" value="Add to Class" class="btn btn-sm btn-success">
        </div>
    </form>
    </div>
</div>
@endsection

@section('third_party_stylesheets') 
<link rel="stylesheet" href="{{ asset('plugin/datatable/buttons.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugin/datatable/dataTables.bootstrap4.min.css') }}">
@stop

@section('third_party_scripts') 
 
<script src="{{ asset('plugin/jquery/jquery.js') }}"  ></script>
<script src="{{ asset('plugin/datatable/jquery.validate.js') }}" defer></script>
<script src="{{ asset('plugin/datatable/jquery.dataTables.min.js') }}" defer></script>
<script src="{{ asset('plugin/datatable/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('plugin/datatable/dataTables.bootstrap4.min.js') }}" defer></script> 
<script src="{{ asset('plugin/datatable/dataTables.buttons.min.js') }}" defer></script> 
<script src="{{ asset('plugin/vendor/datatables/buttons.server-side.js') }}" defer></script>  
@stop

