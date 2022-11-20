@extends('layouts.app')

@section('content')
    <div class="container-fluid">  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create item</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create item</li>
            </ol>
          </div>
        </div>
      </div> 
    </section>
    


    <section class="content"> 
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3> 
        </div>
        @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
        <div class="card-body"> 
          {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}

          <div class="row">          
              <div class="col-xs-12 col-sm-12 col-md-12">

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
                  <label for="name" class="col-sm-2">Permissionme</label>
                  <div class="col-sm-7">
                  <ul class=" list-group">
                  @foreach($permission as $value)
               <li class="list-group-item">   <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                  {{ $value->name }}</label> </li>
     
              @endforeach
            </ul>
          </div>
                </div>
 
 
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
          
          {!! Form::close() !!}

        </div>
        <div class="card-footer"> 
        </div>  
      </div> 

    </section> 
  </div> 
@endsection
