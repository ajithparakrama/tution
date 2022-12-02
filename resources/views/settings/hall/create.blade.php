@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
             <h3 class="card-title">Halls</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Halls</a></li>
                <li class="breadcrumb-item active">Create New</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Create Hall</h2>
            <div class="card-tools">
              <a href="{{ url()->previous() }}" class="btn bg-gray-dark btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <form action="{{ route('hall.store') }}" method="post">
        <div class="card-body">
           
            @csrf
            @method('POST')
              <div class="form-group row">
                <label for="name" class="col-sm-2">Name</label>
                <div class="col-sm-7">
                <input type="text" name="name" id="name" class="  form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              </div>

              <div class="form-group row">
                <label for="capacity" class="col-sm-2">Capacity</label>
                <div class="col-sm-7">
                <input type="text" name="capacity" id="capacity" class="  form-control @error('capacity') is-invalid @enderror" value="{{ old('capacity') }}">
                @error('capacity')
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

