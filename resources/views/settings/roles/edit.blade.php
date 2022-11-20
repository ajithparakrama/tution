@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Item</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Item</li>
                            <li class="breadcrumb-item active">Edit</li>
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
                {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
                <div class="card-body">
                   
                    <div class="form-group row">
                      <label for="guard_name" class="col-sm-2">  name</label>
                                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control col-sm-7']) !!}
                            </div> 

  
                            <div class="form-group row"> 
                                <label for="guard_name" class="col-sm-2">  Permission</label>
                                <div class="col-sm-7"> 
                                @foreach ($permission as $value)
                                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                        {{ $value->name }}</label>
                                    <br />
                                @endforeach
                            </div>
                        </div> 
 
                    </div>
 
                <div class="card-footer">
                    {{ Form::submit('Save', ['class' => 'btn btn-sm btn-success']) }}
                </div>
                {!! Form::close() !!}
            </div>

        </section>
    </div>
@endsection
