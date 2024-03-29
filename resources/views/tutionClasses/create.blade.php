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
                <li class="breadcrumb-item"><a href="#">Subjects</a></li>
                <li class="breadcrumb-item active">Create Class</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <div class="card">
        <div class="card-header">
            <h2 class="card-title">Create Class</h2>
        </div>
        <form action="{{ route('tution.store') }}" method="post">
        <div class="card-body">
           
            @csrf
            @method('POST')
              <div class="form-group row">
                <label for="subject" class="col-sm-2">Name </label>
                <div class="col-sm-7"> 
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
              </div>

              <div class="form-group row">
                <label for="subject" class="col-sm-2">location </label>
                <div class="col-sm-7"> 
                <select name="hall_id" id="hall_id"  class="  form-control @error('hall_id') is-invalid @enderror">
                  <option value=""></option>
                  @foreach ($hall as $item)
                      <option value="{{ $item->id }}" @if($item->id==old('hall_id')) selected @endif>{{ $item->name }}</option>
                  @endforeach
                </select>
                @error('hall_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="subjects_id" class="col-sm-2">Subject  </label>
                <div class="col-sm-7">
                 <select name="subjects_id" id="subjects_id" class="select2 form-control   @error('subjects_id') is-invalid @enderror">
                     <option value=""></option>
                     @foreach ($subject as $item)
                         <option value="{{ $item->id }}" @if($item->id==old('subjects_id')) selected @endif >{{ $item->name }}</option>
                     @endforeach
                 </select>
                @error('subjects_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="subjects_id" class="col-sm-2">Type  </label>
                <div class="col-sm-7">
                 <select name="type" id="type" class="select2 form-control   @error('type') is-invalid @enderror">
                     <option value=""></option>
                     
                         <option value="1" @if(1==old('type')) selected @endif >Theory</option>
                         <option value="2" @if(2==old('type')) selected @endif >Revision</option>
                    
                 </select>
                @error('type')
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

