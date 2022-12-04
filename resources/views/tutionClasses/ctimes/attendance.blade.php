@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4> {{ $ctime->date . '  from ' . $ctime->start_at . '  to ' . $ctime->end_at }} </h4>
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
        @can('class-time-mark-attendance')
        @if( ($ctime->date == date('Y-m-d')) && ($ctime->end_at > date('h:i')) )
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Mark Attendance</h2>
                <div class="card-tools">
                    <a href="{{ route('ctimes.index',$tution->id)}}" class="btn bg-gray-dark btn-sm"><i class="fa fa-arrow-left"></i>
                        Back</a>
                </div>
            </div>
 
                <form action="{{ route('ctimes.markattendance', [$tution->id, $ctime->id]) }}" method="post">
                    <div class="card-body">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label for="Search" class="col-md-3 text-right">Student </label>
                            <div class="col-md-4">

                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control @error('student_id') is-invalid @enderror"
                                        name="student_id" id="" placeholder="Scann QR or type ID">
                                    @error('students_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-success btn-flat">in!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </div>
        @else
        <div class="card-body">
            <div class="callout callout-info">
                <h5> Class is over Now! <a href="{{ route('ctimes.index',$tution->id)}}" class="btn bg-gray-dark btn-sm d-inline-block float-right"><i class="fa fa-arrow-left"></i>
                    Back</a></h5>  
                
              </div> 
        </div>
        @endif

        @endcan

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Attend Students    {{ $ctime->students->count() }} /  {{ $tution->student->count() }} </h2>

            </div>

            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    @endsection

@section('third_party_stylesheets')
    <link rel="stylesheet" href="{{ asset('plugin/datatable/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/select2/css/select2.css') }}">
@stop

@section('third_party_scripts')

    <script src="{{ asset('plugin/jquery/jquery.js') }}"></script>
    <script src="{{ asset('plugin/datatable/jquery.validate.js') }}" defer></script>
    <script src="{{ asset('plugin/datatable/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('plugin/datatable/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('plugin/datatable/dataTables.bootstrap4.min.js') }}" defer></script>
    <script src="{{ asset('plugin/datatable/dataTables.buttons.min.js') }}" defer></script>
    <script src="{{ asset('plugin/vendor/datatables/buttons.server-side.js') }}" defer></script>

    {!! $dataTable->scripts() !!}

@stop
