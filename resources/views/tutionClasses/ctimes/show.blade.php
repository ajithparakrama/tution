@extends('layouts.app') 
@section('content')
<div class="container-fluid">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
             <h3 class="card-title">Class Dates and times</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Tutions </a></li>
                <li class="breadcrumb-item active">All My tutions</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">{{ $tution->name }} at {{ ($tution->hall->name)??'' }}</h2>

            <div class="card-tools">

              
            </div>
        </div>
        
        <div class="card-body"> 

        </div> 
    </div>
</div>
@endsection

@section('third_party_stylesheets')  
@stop

@section('third_party_scripts') 
 
 
@stop

