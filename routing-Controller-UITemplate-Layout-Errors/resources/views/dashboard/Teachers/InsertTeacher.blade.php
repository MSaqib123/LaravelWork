@extends('layout.dashboard')

@section('content')

    
<h2>Add New Teacher</h2>
<br>

<form method="POST" action="{{url('/Teachers/CreatePost')}}" enctype="multipart/form-data">
  @csrf
  <!--____________ 1. Usernmae , fName , age __________-->
    <div class="form-group row">
      <label for="Name" class="col-sm-2 col-form-label">Enter Name</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="Name" placeholder="Enter Name" name="Name">
        @error('Name')
          <p class="text-danger">{{$message}}</p>
        @enderror
      </div>      
    </div>

    <div class="form-group row">
      <label for="Grade" class="col-sm-2 col-form-label">Enter Grade</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="Grade" placeholder="Enter Grade" name="Grade">
        @error('Grade')
          <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
    </div>

     <!--____________ 2. CheckBox __________-->
     <div class="form-group row">
        <label for="maleGender" class="col-sm-2 col-form-label">Gender</label>
        <div class="col-sm-9">
          <label><input type="radio" id="maleGender" placeholder="Age" name="Gender" value="M">&nbsp; Male </label>&nbsp; &nbsp; 
          <label><input type="radio" id="femaleGender" placeholder="Age" name="Gender" value="F">&nbsp; Female </label>
           @error('Gender')
            <p class="text-danger">{{$message}}</p>
           @enderror
        </div>
      </div>


    <div class="form-group row">
      <label for="email1" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" id="email1" placeholder="email1" name="Email">
        @error('email')
            <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
    </div>

      <!--____________ 6. Image __________-->
      <div class="form-group row">
        <label for="sub1" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-9">
          <input type="file" name="img" class="form-control" />
        </div>
      </div>

    
    <div class="form-group row">
      <label for="sub1" class="col-sm-2 col-form-label">Status</label>
      <div class="col-sm-9 mt-3">
            <select name="Status" class="form-select">
                <option value="" selected disabled>------ Select -----</option>
                <option value="1">Active</option>
                <option value="0">UnActive</option>
            </select>
            @error('status')
                <p class="text-danger">{{$message}}</p>
            @enderror
      </div>
    </div>
    
    <button type="submit" class="btn btn-primary me-2">Submit</button>
    <button class="btn btn-light">Cancel</button>
</form>    



@endsection