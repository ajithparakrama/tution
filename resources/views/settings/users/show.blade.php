@extends('layouts.app')

@section('content')
    <div class="container-fluid">  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $user->name }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $user->name }}</li>
            </ol>
          </div>
        </div>
      </div> 
    </section>
 
    <section class="content"> 
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Details</h3> 
          <div class="card-tools">
            <a href="{{ url()->previous() }}" class="btn bg-gray-dark btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
          </div>
        </div>
        <div class="card-body">
          <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">
    
                <strong>Name:</strong>
    
                {{ $user->name }}
    
            </div>
    
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12">
    
            <div class="form-group">
    
                <strong>Email:</strong>
    
                {{ $user->email }}
    
            </div>
    
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12">
    
            <div class="form-group">
    
                <strong>Roles:</strong>
    
                @if(!empty($user->getRoleNames()))
    
                    @foreach($user->getRoleNames() as $v)
    
                        <label class="badge badge-success">{{ $v }}</label>
    
                    @endforeach
    
                @endif
    
            </div>
    
        </div>
        </div> 
        <div class="card-footer">
           
        </div> 
      </div> 

    </section> 
  </div> 
@endsection
