@extends('layouts.admin.app')

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
                <li class="breadcrumb-item"><a href="#">Institutes</a></li>
                <li class="breadcrumb-item active">Create New</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Create Institutes</h2>
        </div>
        <form action="{{ route('admin.institute.store') }}" method="post">
        <div class="card-body">
           
            @csrf
            @method('POST')
              <div class="form-group row">
                <label for="name" class="col-sm-2">Name</label>
                <input type="text" name="name" id="name" class=" col-sm-7 form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group row">
                <label for="address" class="col-sm-2">Address</label>
                <input type="text" name="address" id="address" class=" col-sm-7 form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                @error('address')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group row">
                <label for="phone" class="col-sm-2">Phone</label>
                <div class="col-sm-4">
                <input type="text" name="phone" id="phone" class="  form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="col-sm-4">
                <input type="text" name="phone1" class="  form-control @error('phone1') is-invalid @enderror" value="{{ old('phone1') }}">
                @error('phone1')
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

