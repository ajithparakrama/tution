@extends('layouts.app')

@section('title', 'Tution Classes')

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
                            <li class="breadcrumb-item"><a href="#">{{ $tution->name }}</a></li>
                            <li class="breadcrumb-item active">Add Date and time</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Add Date and time</h2>
                <div class="card-tools"> <a href="{{ url()->previous() }}" class="btn bg-gray-dark btn-sm"><i class="fa fa-arrow-left"></i> Back</a></div>
            </div>
            <form action="{{ route('ctimes.store',$tution->id) }}" method="post">
                <div class="card-body">

                    @csrf
                    @method('POST')

                    <div class="form-group row">
                        <label for="subject" class="col-sm-2">Date </label>
                        <div class="col-sm-4">

                          <div class="input-group date @error('date') is-invalid @enderror" id="date" data-target-input="nearest">
                            <input type="text" class="form-control @error('date') is-invalid @enderror"   name="date" data-toggle="datetimepicker"  value="{{ old('date') }}"data-target="#date">
                            <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class='fa fa-calendar-alt'></i></div> 
                              </div></div>  
                              @error('date')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                            
 

                        </div>

                    </div>

                    <div class="form-group row">
                      <label for="subject" class="col-sm-2">Time From</label>
                      <div class="col-sm-2"> 
                              <div class="input-group date @error('start_at') is-invalid @enderror" id="start_at" data-target-input="nearest">
                                <input type="text" class="form-control @error('start_at') is-invalid @enderror"  name="start_at" data-toggle="datetimepicker"  value="{{ old('start_at') }}"data-target="#start_at">
                                  <div class="input-group-append" data-target="#start_at" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class='fa fa-clock'></i></div>
                                  </div>
                                </div>  

                          @error('start_at')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <label for="subject" class="col-sm-1 text-right">To </label>
                      <div class="col-sm-2">
 
                            <div class="input-group date @error('end_at') is-invalid @enderror" id="end_at" data-target-input="nearest">
                              <input type="text" class="form-control @error('end_at') is-invalid @enderror"  name="end_at" data-toggle="datetimepicker"  value="{{ old('end_at') }}"data-target="#end_at">
                                <div class="input-group-append" data-target="#end_at" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class='fa fa-clock'></i></div>
                                </div>
                              </div>  

                        @error('end_at')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>



                    <div class="form-group row">
                        <label for="subjects_id" class="col-sm-2">Remarks </label>
                        <div class="col-sm-7">
                            <textarea name="remarks" id="" cols="30" rows="3" class="form-control os-textarea">{{ old('remarks') }}</textarea>

                            @error('subjects_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>






                </div>
                <div class="card-footer">
                    <input type="submit" value="Save" class="btn btn-sm btn-info">
                </div>
            </form>
        </div>
    </div>
@endsection


@section('third_party_css')

  <!-- Tempusdominus Bootstrap 4 --> 
  <link rel="stylesheet" href="{{ asset('plugin/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugin/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@stop

@section('third_party_scripts')
<script src="{{ asset('plugin//bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugin/moment/moment.min.js') }}" defer></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugin/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}" defer></script>

<script> 

  $(document).ready(function(){ 
    $('#date').datetimepicker({ format: 'YYYY-MM-DD',  icons: { time: 'far fa-clock' } });
    $('#start_at').datetimepicker({ format: 'HH:mm', icons: { time: 'far fa-clock' } });
    $('#end_at').datetimepicker({ format: 'HH:mm',  icons: { time: 'far fa-clock' } });
  
    });
  </script> 
  @stop