@extends('layouts.app') 
@section('content')
<div class="container-fluid">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
             <h3>Staff</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Tutions </a></li>
                <li class="breadcrumb-item "><a href="#">{{ $tution->name }}</a></li>
                <li class="breadcrumb-item active">Staff</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">{{ $tution->name }} Students List at {{ ($tution->hall->name)??'' }}</h2>
            <div class="card-tools">
              <a href="{{ url()->previous() }}" class="btn bg-gray-dark btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <form action="{{ route('tution.staff-store',$tution->id) }}" method="post">
        <div class="card-body">  
                    @csrf
                    @method('POST')

                    <div class="form-group row">
                        <label for="user_id" class="col-md-3">Staff</label>
                        <div class="col-md-4">
                            <select name="user_id[]" id="user_id" class="select2 form-control  @error('user_id') is-invalid @enderror" multiple="multiple">
                                <option value=""></option>
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}" @if(in_array($item->id,$tution->staff->pluck('id')->toArray())) selected @endif  >{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
               
        </div> 
        <div class="card-footer">
            <input type="submit" value="Update Staff" class="btn btn-sm btn-success">
        </div>
    </form>
    </div>
</div>
@endsection

@section('third_party_stylesheets')  
<link rel="stylesheet" href="{{ asset('plugin/select2/css/select2.css') }}">
@stop

@section('third_party_scripts') 
<script src="{{ asset('plugin/jquery/jquery.js') }}"  ></script> 

<script src="{{ asset('plugin/select2/js/select2.js') }}"  ></script> 
<script>
    $('.select2').select2();
  </script>
@stop

