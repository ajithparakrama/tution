@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        
        <div class="row pt-2">

            @can('student-list')
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-pink"><i class="fa fa-users"></i></span>
                        <div class="info-box-content text-right">
                            <span class="info-box-text"> <b>{{ $students }} </b> Students</span>
                            <span class="info-box-number"> <a href="{{ route('students.index') }}"
                                    class="btn btn-xs btn-success">All</a>
                                @can('student-create')
                                    <a href="{{ route('students.create') }}" class="btn btn-xs btn-info">Add New</a></span>
                            @endcan
                        </div>
                    </div>
                </div>
            @endcan

            @can('subject-list')
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class=" fa fa-book"></i></span>
                        <div class="info-box-content text-right">
                            <span class="info-box-text"> <b>{{ $subjcets }} </b> Subjects</span>
                            <span class="info-box-number"> <a href="{{ route('subjects.index') }}"
                                    class="btn btn-xs btn-success">All</a>
                                @can('subject-create')
                                    <a href="{{ route('subjects.create') }}" class="btn btn-xs btn-info">Add New</a></span>
                            @endcan
                        </div>
                    </div>
                </div>
            @endcan

            @can('halls-list')
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-purple"><i class=" fa fa-map-marker"></i></span>
                        <div class="info-box-content text-right">
                            <span class="info-box-text"> <b>{{ $hall }} </b> Lecture Halls</span>
                            <span class="info-box-number"> <a href="{{ route('hall.index') }}"
                                    class="btn btn-xs btn-success">All</a>
                                @can('halls-create')
                                    <a href="{{ route('hall.create') }}" class="btn btn-xs btn-info">Add New</a></span>
                            @endcan
                        </div>
                    </div>
                </div>
            @endcan


            @can('user-list')
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-orange"><i class="fa  fa-users"></i></span>
                        <div class="info-box-content text-right">
                            <span class="info-box-text"> <b>{{ $user }} </b> Users</span>
                            <span class="info-box-number"> <a href="{{ route('users.index') }}"
                                    class="btn btn-xs btn-success">All</a>
                                @can('user-create')
                                    <a href="{{ route('users.create') }}" class="btn btn-xs btn-info">Add New</a></span>
                            @endcan
                        </div>
                    </div>
                </div>
            @endcan

 
        </div>
        <div class="row">
            @foreach ($tutions as $item)

            <div class="col-md-4">
                <div class="card card-widget">
                    <div class=" card-header  ">
                        <h4 class="widget-user-username">{{ $item->name }} <Small>@ {{ ($item->hall->name)??'' }}</Small></h4> 
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('tstudents.index',$item->id) }}" class="nav-link">
                                    Students <span class="float-right badge bg-primary">{{ $item->student->count() }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tution.staff',$item->id) }}" class="nav-link">
                                    Staff <span class="float-right badge bg-info">{{ $item->staff->count() }}</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('ctimes.index',$item->id) }}" class="nav-link">
                                    Next Dates 
                                    @foreach($item->ctimes->where('date','>=',date('Y-m-d')) as $it)
                                    <span class="float-right badge bg-success">{{ $it->date }}</span>
                                    @endforeach
                                    
                                </a>
                            </li>

                            <a href="{{ route('report.index',$item->id) }}" class="nav-link">
                                Reports 
                            </a>
 
                        </ul>
                    </div>
                </div>
            </div>                            
            @endforeach
        </div>

        <div class="row">
            @foreach (Auth::user()->TutionClass as $item)

            <div class="col-md-4">
                <div class="card card-widget">
                    <div class=" card-header  ">
                        <h4 class="widget-user-username">{{ $item->name }} <Small>@ {{ ($item->hall->name)??'' }}</Small></h4> 
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('tstudents.index',$item->id) }}" class="nav-link">
                                    Students <span class="float-right badge bg-primary">{{ $item->student->count() }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <ul>
                               @foreach($item->staff as $it)
                                  <li class=" d-inline-block">{{ $it->name }}  </li> | 
                               @endforeach
                            </ul>
                                </a>
                            </li>

                            @if(Auth::user()->hasRole('Cachier'))
                            <li class="nav-item">
                                <a href="{{ route('payemnt-months.index',$item->id) }}" class="nav-link">
                                    Payments  
                                </a>
                            </li>

                            @endif

                            <li class="nav-item"> 
                                    @foreach($item->ctimes->where('date','>=',date('Y-m-d')) as $it)
                                    <a href="{{ route('ctimes.attendance',[$item->id,$it->id]) }}" class="nav-link d-inline-block">
                                    <span class="float-right badge bg-success">{{ $it->date }}</span>
                                 </a>
                                    @endforeach 
                               
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('report.index',$item->id) }}" class="nav-link">
                                    Reports 
                                </a>
                            </li>
 
                        </ul>
                    </div>
                </div>
            </div>
                            
            @endforeach

        </div>
    </div>
@endsection
