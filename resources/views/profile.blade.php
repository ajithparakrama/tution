@extends('layouts.app')

@section('content')
<section class="content-header">
  
  <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Profile</li> 
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
 
<div class="col-sm-11">
    <div class="card card-red">
        <div class="card-header">
            <div class="card-title"> 
                Change Password
            </div>
        </div> 
        
            <form method="post" action="{{ route('change.password') }}" enctype="multipart/form-data">
                <div class="card-body"> 
                @csrf
                @method('POST')
                <div class="form-group row">
                    <label for="fromdate" class="col-sm-3 col-form-label">Current Password</label>
                    <div class="col-sm-6">
                    <input type="password"
                           name="current_password"
                           value="{{ old('current_password') }}"
                           class="form-control @error('current_password') is-invalid @enderror"
                           placeholder="current password"> 
                    @error('current_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                </div>
        
                <div class="form-group row">
                    <label for="fromdate" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-6">
                    <input type="password"
                           name="new_password"
                           class="form-control @error('new_password') is-invalid @enderror"
                           placeholder="new password"> 
                    @error('new_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
        
                                    <div class="form-group row">
                    <label for="fromdate" class="col-sm-3 col-form-label"> Confirmation password</label>
                    <div class="col-sm-6">
                    <input type="password"
                           name="new_confirm_password"
                           class="form-control @error('new_confirm_password') is-invalid @enderror"
                           placeholder="Retype new password">
                           @error('new_confirm_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    
                </div>
                </div>
                </div>

                <div class="card-footer text-right">                
                <input type="submit" value="Update" class="btn btn-sm btn-success">
            </div>
        
            </form>


    </div>
</div>
    
    
 
 
</div>
 
@endsection

@section('third_party_stylesheets')  
@stop

@section('third_party_scripts')  
@stop
