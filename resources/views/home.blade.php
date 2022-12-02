@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Dashboard</h1>
        <div class="row">

            @can('student-list')
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                        <div class="info-box-content">
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
                        <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                        <div class="info-box-content">
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
                        <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                        <div class="info-box-content">
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
                        <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                        <div class="info-box-content">
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


            @can('profile')
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Profile </span>
                            <span class="info-box-number"> <a href="{{ route('profile') }}"
                                    class="btn btn-xs btn-default">Change Password</a> </span>
                        </div>
                    </div>
                </div>
            @endcan

            @foreach ($tutions as $item)

            <div class="col-md-4">
                <div class="card card-widget widget-user-2">
                    <div class="widget-user-header bg-warning">
                        <h3 class="widget-user-username">{{ $item->name }}</h3>
                        <h5 class="widget-user-desc">{{ ($item->hall->name)??'' }}</h5>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Students <span class="float-right badge bg-primary">{{ $item->student->count() }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Staff <span class="float-right badge bg-info">{{ $item->staff->count() }}</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Next Dates 
                                    @foreach($item->ctimes->where('date','>',date('Y-m-d')) as $it)
                                    <span class="float-right badge bg-success">{{ $it->date }}</span>
                                    @endforeach
                                    
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('tution.show',$item->id) }}" class="nav-link">
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
