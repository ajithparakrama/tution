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
                <li class="breadcrumb-item active"> Edit Student</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Edit Student <small>{{ $student->name }}</small></h2>
        </div>
        <form action="{{ route('students.update',$student->id) }}" method="post" enctype="multipart/form-data">
        <div class="card-body"> 
            @csrf
            @method('PUT') 
              <div class="form-group row">
                <label for="subject" class="col-sm-2">Name</label>
                <div class="col-sm-7"> 
                <input type="text" name="name" class=" form-control @error('name') is-invalid @enderror" value="{{ $student->name }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              </div>

              <div class="form-group row">
                <label for="subject" class="col-sm-2">NIC</label>
                <div class="col-sm-3">
                <input type="text" name="nic" class=" form-control @error('nic') is-invalid @enderror" value="{{ $student->nic }}">
                @error('nic')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror 
            </div>
                <label for="subject" class="col-sm-2">Date of Birth</label>
                <div class="col-sm-2">
                <input type="date" name="dob" class=" form-control @error('dob') is-invalid @enderror" value="{{ $student->dob }}">
                @error('dob')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
              </div>

              <div class="form-group row">
                <label for="subject" class="col-sm-2">Gender</label>
                <div class="col-sm-7">

                  <div class="form-group clearfix">
                    <div class="icheck-danger d-inline">
                      <input type="radio" name="gender"  id="radioDanger1" value="1" @if($student->gender==1) checked @endif >
                      <label for="radioDanger1" class="@error('gender') is-invalid @enderror">
                        Male
                      </label>
                    </div>
                    <div class="icheck-danger d-inline">
                      <input type="radio" name="gender" value="2" @if($student->gender==2) checked @endif  id="radioDanger2">
                      <label for="radioDanger2">
                        Female
                      </label>
                    </div> 
                  </div> 
                @error('gender')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              </div>

              <div class="form-group row">
                <label for="subject" class="col-sm-2">Phone</label>
                <div class="col-sm-3">
                <input type="text" name="phone" class="  form-control @error('phone') is-invalid @enderror" value="{{ $student->phone }}">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            

              <div class="col-sm-3"> 
                <input type="text" name="phone1" class="  form-control @error('phone1') is-invalid @enderror" value="{{ $student->phone1 }}">
                @error('phone1')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
                <label for="subject" class="col-sm-2">Address</label> 
                <div class="col-sm-7">
                <textarea name="address" id="address" cols="2" rows="2" class="form-control @error('address') is-invalid @enderror">{{ $student->address }}</textarea>
                @error('address')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

              <div class="form-group row">
                <label for="subject" class="col-sm-2">email</label>
                <div class="col-sm-7">
                <input type="text" name="email" class="  form-control @error('email') is-invalid @enderror" value="{{ $student->email }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              </div>

              <div class="form-group row">
                <label for="subject" class="col-sm-2">Parent Name</label>
                <div class="col-sm-7">
                <input type="text" name="parent_name" class="  form-control @error('parent_name') is-invalid @enderror" value="{{ $student->parent_name }}">
                @error('parent_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              </div>



              <div class="form-group row">
                <label for="subject" class="col-sm-2">parent contact</label>
                <div class="col-sm-3">
                <input type="text" name="parent_contact" class="form-control @error('parent_contact') is-invalid @enderror" value="{{ $student->parent_contact }}">
                @error('parent_contact')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              
              <div class="col-sm-3">
                <input type="text" name="parent_contact1" class=" form-control @error('parent_contact1') is-invalid @enderror" value="{{ $student->parent_contact1 }}">
                @error('parent_contact1')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>





 
        </div>
        <div class="card-footer">
            <input type="submit" value="Save" class="btn btn-sm btn-info">
        </div>
      </form>
    </div>
</div>
@endsection

@section('third_party_scripts')

@endsection

