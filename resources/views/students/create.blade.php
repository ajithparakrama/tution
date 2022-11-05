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
                <li class="breadcrumb-item active">Register Student</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    
    <div class="card card-green">
        <div class="card-header">
            <h2 class="card-title">Register Student</h2>
            <div class="card-tools"><a href="{{ url()->previous() }}" class="btn bg-gray-dark btn-sm"><i class="fa fa-arrow-left"></i> Back</a></div>
        </div>
        <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
        <div class="card-body"> 
            @csrf
            @method('POST')

 
               
              <div class="form-group row">
                <label for="subject" class="col-sm-2">Name</label>
                <div class="col-sm-7"> 
                <input type="text" name="name" class=" form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
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
                <input type="text" name="nic" class=" form-control @error('nic') is-invalid @enderror" value="{{ old('nic') }}">
                @error('nic')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror 
            </div>
                <label for="subject" class="col-sm-2">Date of Birth</label>
                <div class="col-sm-2">
                <input type="date" name="dob" class=" form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}">
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
                      <input type="radio" name="gender"  value="1" @if(old('gender')==1) checked @endif  id="radioDanger1">
                      <label for="radioDanger1" class="@error('gender') is-invalid @enderror">
                        Male
                      </label>
                    </div>
                    <div class="icheck-danger d-inline">
                      <input type="radio" name="gender"  value="2" @if(old('gender')==2) checked @endif id="radioDanger2">
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
                <input type="text" name="phone" class="  form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            

              <div class="col-sm-3"> 
                <input type="text" name="phone1" class="  form-control @error('phone1') is-invalid @enderror" value="{{ old('phone1') }}">
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
                <textarea name="address" id="address" cols="2" rows="2" class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
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
                <input type="text" name="email" class="  form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
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
                <input type="text" name="parent_name" class="  form-control @error('parent_name') is-invalid @enderror" value="{{ old('parent_name') }}">
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
                <input type="text" name="parent_contact" class="form-control @error('parent_contact') is-invalid @enderror" value="{{ old('parent_contact') }}">
                @error('parent_contact')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              
              <div class="col-sm-3">
                <input type="text" name="parent_contact1" class=" form-control @error('parent_contact1') is-invalid @enderror" value="{{ old('parent_contact1') }}">
                @error('parent_contact1')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="subject" class="col-sm-2">Classes</label>
              <div class="col-sm-7">
              <select name="tution_classes_id[]" id="" class=" select2 form-control text-black" multiple="multiple">
                @foreach ($tutionClass as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
              
                @error('parent_name')
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

@section('third_party_stylesheets') 
<link rel="stylesheet" href="{{ asset('plugin/select2/css/select2.css') }}">
  <link rel="stylesheet" href="{{ asset('plugin/select2-bootstrap4-theme/select2-bootstrap4.css') }}">
@stop
@section('third_party_scripts')
<script src="{{ asset('plugin/select2/js/select2.js') }}" defer></script>
  <script>
    $(document).ready(function() {
    $('.select2').select2();
});
  </script>
@stop

