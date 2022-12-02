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
                <li class="breadcrumb-item"><a href="#">Subjects</a></li>
                <li class="breadcrumb-item active">Edit {{ $subject->name }}</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Edit {{ $subject->name }}</h2>
            <div class="card-tools">  <a href="{{ url()->previous() }}" class="btn bg-gray-dark btn-sm"><i class="fa fa-arrow-left"></i> Back</a></div>
        </div>
        <form action="{{ route('subjects.update',$subject->id) }}" method="post">

        <div class="card-body">
           
            @csrf
            @method('PUT')
              <div class="form-group row">
                <label for="subject" class="col-sm-2">Name of the subject</label>
                <input type="text" name="name" class=" col-sm-7 form-control @error('name') is-invalid @enderror" value="{{ $subject->name }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
 
        </div>
        <div class="card-footer">
            <input type="submit" value="Save" class="btn btn-sm btn-info">
        </div>
      </form>
    </div>
</div>
@endsection

