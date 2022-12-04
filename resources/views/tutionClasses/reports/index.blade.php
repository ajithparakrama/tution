@extends('layouts.app') 
@section('content')
<div class="container-fluid">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
             <h3>Reports : {{ $tution->name }}</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Tutions </a></li>
                <li class="breadcrumb-item "><a href="#">{{ $tution->name }}</a></li>
                <li class="breadcrumb-item active">Reports</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    
    <div class="card">
        <div class="card-header">
            <h2 class="card-title"> Attendance </h2>
            <div class="card-tools">
              <a href="{{ url()->previous() }}" class="btn bg-gray-dark btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>

        <div class="card-body">
          <canvas id="myChart" height="150px"></canvas>
        </div>
        <div class="card-header">
          <h2 class="card-title"> Payments </h2>
 
      </div>
        <div class="card-body">
          <canvas id="Income" height="150px"></canvas>
        </div>
 

      </div>
</div>
@endsection

@section('third_party_stylesheets')  
<script src="{{ asset('plugin/chart.js/dist/Chart.css') }}"></script>
@stop

@section('third_party_scripts')  
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@php($dates = $tution->ctimes->pluck('date'));

@php($students=array())

@foreach ($tution->ctimes as $item)
@php($students[] = $item->students->count() );
@endforeach

@php($months = $tution->paymentMonths->pluck('name'));

@php($total=array())
@foreach ($tution->paymentMonths as $item)
@php($total[] = $item->student()->pluck('amount')->sum() );
@endforeach

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: {!! $dates !!},
      datasets: [{
        label: ' Students',
        data: {!! json_encode($students) !!},
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });


  const ctxx = document.getElementById('Income');

new Chart(ctxx, {
  type: 'line',
  data: {
    labels: {!! $months !!},
    datasets: [{
      label: ' Total',
      data: {!! json_encode($total) !!},
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
</script>
@stop

