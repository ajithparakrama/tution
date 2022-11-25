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
                <h2 class="card-title">{{ $tution->name }} Payment for {{ $payment_month->name }}</h2>
                <div class="card-tools">
                    <a href="{{ route('payemnt-months.index',$tution->id) }}" class="btn bg-gray-dark btn-sm"><i class="fa fa-arrow-left"></i>
                        Back</a>

                      
                </div>
            </div>
            @can('class-add-payments')
                <form action="{{ route('payemnt-months.store', [$tution->id, $payment_month->id]) }}" method="post">
                    <div class="card-body">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label for="Search" class="col-md-3">Student ID</label>
                            <div class="col-md-4">
                                <select name="students_id" id=""
                                    class="select2 form-control  @error('students_id') is-invalid @enderror" required>
                                    @foreach ($tution->student as $item)
                                        <option value="{{ $item->id }}">{{ $item->id }}</option>
                                    @endforeach
                                </select>
                                @error('students_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Search" class="col-md-3">Payment Ammount</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control text-right @error('amount') is-invalid @enderror"
                                    name="amount" value="{{ old('amount') }}" required>
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <input type="submit" value="Add Payment" class="btn btn-sm btn-success">
                    </div>
                </form>
            @endcan
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Paid Students</h2>

            <div class="card-tools">

            </div>
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

    <script src="{{ asset('plugin/select2/js/select2.js') }}"></script>

    {!! $dataTable->scripts() !!}

    <script>
        $('.select2').select2();
    </script>
@stop
