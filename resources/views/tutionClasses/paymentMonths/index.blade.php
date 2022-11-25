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
              @role('Cachier')
              <a href="{{  route('tution.check-list') }}" class="btn bg-gray-dark btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
              @else 
              <a href="{{  route('tution.index') }}" class="btn bg-gray-dark btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
              @endrole 
            </div>
        </div>
        
        <div class="card-body"> 
            <table class="table table-hover">
              <tr>
                <th>No</th>
                <th>Payment Month</th> 
                <th  >Payments</th>
              </tr> 
              @foreach($tution->paymentMonths->sortBy('id') as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                             <td>{{ $item->name }}</td> 
                <td>
                  <a href="{{ route('payemnt-months.add-payment',[$tution->id,$item->id]) }}" class="btn btn-xs btn-info" title="Payments" data-toggle="tolltip"><i class="fa fa-credit-card"></i></a>
                </td>
              </tr>
              @endforeach
            </table>
        </div> 
    </div>
</div>
@endsection

@section('third_party_stylesheets') 
<link rel="stylesheet" href="{{ asset('plugin/datatable/buttons.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugin/datatable/dataTables.bootstrap4.min.css') }}">
@stop

@section('third_party_scripts') 
 
<script src="{{ asset('plugin/jquery/jquery.js') }}"  ></script>
<script src="{{ asset('plugin/datatable/jquery.validate.js') }}" defer></script>
<script src="{{ asset('plugin/datatable/jquery.dataTables.min.js') }}" defer></script>
<script src="{{ asset('plugin/datatable/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('plugin/datatable/dataTables.bootstrap4.min.js') }}" defer></script> 
<script src="{{ asset('plugin/datatable/dataTables.buttons.min.js') }}" defer></script> 
<script src="{{ asset('plugin/vendor/datatables/buttons.server-side.js') }}" defer></script> 
 
@stop

