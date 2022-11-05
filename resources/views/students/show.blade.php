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
                <li class="breadcrumb-item"><a href="#">Student</a></li>
                <li class="breadcrumb-item active"> {{ $student->name }}</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    
    <div class="card card-green">
        <div class="card-header">
            <h2 class="card-title"> <small>{{ $student->name }}</small></h2>
            <div class="card-tools"><a href="{{ url()->previous() }}" class="btn bg-gray-dark btn-sm"><i class="fa fa-arrow-left"></i> Back</a></div>
        </div> 
        <div class="card-body">  
              <div class="form-group row">
                <label for="subject" class="col-sm-2">Name</label>
                <div class="col-sm-7"> 
                {{  $student->name }}  
              </div>
              </div>

              <div class="form-group row">
                <label for="subject" class="col-sm-2">NIC</label>
                <div class="col-sm-3">
                {{ $student->nic }}  
            </div>
                <label for="subject" class="col-sm-2">Date of Birth</label>
                <div class="col-sm-2">
                 {{ $student->dob }}              
            </div>
              </div>

              <div class="form-group row">
                <label for="subject" class="col-sm-2">Gender</label>
                <div class="col-sm-7">

                  <div class="form-group clearfix">
                    <div class="icheck-danger d-inline"> 
                      @if($student->gender==1) 
                        Male
                        @endif
                         @if($student->gender==2) 
                        Female
                        @endif   
                    </div> 
                  </div>  
              </div>
              </div>

              <div class="form-group row">
                <label for="subject" class="col-sm-2">Phone</label>
                <div class="col-sm-3">
                {{ $student->phone }}
 
              </div>
            

              <div class="col-sm-3"> 
                {{ $student->phone1 }}
 
              </div>
            </div>

            <div class="form-group row">
                <label for="subject" class="col-sm-2">Address</label> 
                <div class="col-sm-7">
                {{ $student->address }}
 
              </div>
            </div>

              <div class="form-group row">
                <label for="subject" class="col-sm-2">email</label>
                <div class="col-sm-7">
                 {{ $student->email }}
 
              </div>
              </div>

              <div class="form-group row">
                <label for="subject" class="col-sm-2">Parent Name</label>
                <div class="col-sm-7">
                 {{ $student->parent_name }}
 
              </div>
              </div>



              <div class="form-group row">
                <label for="subject" class="col-sm-2">parent contact</label>
                <div class="col-sm-3">
                 {{ $student->parent_contact }}
 
              </div>
              
              <div class="col-sm-3">
                 {{ $student->parent_contact1 }} 
 
              </div>
            </div>


            <div class="form-group row">
                <label for="subject" class="col-sm-2">Classes</label>
                <div class="col-sm-10">
                    <ul>
                    @foreach ($student->TutionClass as $item)
                        <li> {{ $item->name }} | {{ $item->subject->name }} | {{ $item->location }} | {{ $item->teacher->name }} </li>
                    @endforeach
                </ul>
              </div>
            </div>


 
        </div>
        <div class="card-footer">
            <input type="submit" value="Save" class="btn btn-sm btn-info">
        </div> 
    </div>
</div>
@endsection

@section('third_party_scripts')

@endsection

