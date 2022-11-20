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
            <h2 class="card-title">{{ $tution->name }} Students List at {{ ($tution->hall->name)??'' }}</h2>
            <div class="card-tools"> 
              <form action="{{ route('tstudent.save-to-class',$tution->id) }}" method="post" class="d-inline">
              <div class="input-group input-group-sm">
              
                @csrf
                    @method('POST')
                <input type="text" class="form-control text-lg @error('student_id') is-invalid @enderror" placeholder="Student ID" name="student_id" value="{{ old('student_id') }}" required> 
                @error('student_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="input-group-append">
                  <button type="submit" class="btn btn-success btn-flat">Add Student</button>
                </span> 
               
                &nbsp;&nbsp;&nbsp;
                <a href="{{ route('students.create') }}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Register New Student</a>
                &nbsp;&nbsp;&nbsp;
                <a href="{{ url()->previous() }}" class="btn bg-gray-dark btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
              </div>
            </form>
              {{-- <a href="{{ route('tstudent.add-to-class',$tution->id) }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Student</a> --}}
             
            </div>
        </div>
        
        <div class="card-body">
            {{$dataTable->table()}} 
 
        </div> 
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
{!! $dataTable->scripts() !!} 
@stop

