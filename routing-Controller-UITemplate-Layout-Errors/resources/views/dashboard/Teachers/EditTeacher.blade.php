@extends('layout.dashboard')

@section('content')
        
    <h2>Add New Teacher</h2>
    <br>

    <form method="POST" action="{{url('/Teachers/EditPost')}}/{{$t->id}}" enctype="multipart/form-data">
    @csrf

    
    <!--____________ 1. Usernmae , fName , age __________-->
        <div class="form-group row">
            <label for="Name" class="col-sm-2 col-form-label">Enter Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="Name" value="{{$t->name}}" placeholder="Enter Name" name="Name">
                @error('Name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email1" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="email" class="form-control" id="email1" value="{{$t->email}}" placeholder="email1" name="Email">
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="Grade" class="col-sm-2 col-form-label">Enter Grade</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="Grade" value="{{$t->grade}}" placeholder="Enter Grade" name="Grade">
                @error('Grade')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <!--____________ 2. CheckBox __________-->
        <div class="form-group row">
            <label for="maleGender" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-9">
                @if ($t->gender == 'M')
                    <label><input type="radio" id="maleGender" placeholder="Age" name="Gender" checked value="M">&nbsp; Male </label>&nbsp; &nbsp; 
                    <label><input type="radio" id="femaleGender" placeholder="Age" name="Gender" value="F">&nbsp; Female </label> 
                    @else
                    <label><input type="radio" id="maleGender" placeholder="Age" name="Gender"  value="M">&nbsp; Male </label>&nbsp; &nbsp; 
                    <label><input type="radio" id="femaleGender" placeholder="Age" name="Gender" checked     value="F">&nbsp; Female </label> 
                @endif
                @error('Gender')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>


        

        <!--____________ 6. Image __________-->
        <div class="form-group row">
            <label for="sub1" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-9">
                <input type="hidden" name="oldImg" value="{{$t->img}}" class="form-control" />    
                <input type="file" name="img" class="form-control" />
                <img class="img-fluid mt-4" src="/{{$t->img}}"/>
            </div>
        </div>

        
        <div class="form-group row">
        <label for="sub1" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-9 mt-3">
                <select name="Status" class="form-select">
                    @if ($t->status == 1)
                    <option value="1" selected>Active</option>
                    <option value="0">UnActive</option>
                        @else
                        <option value="1">Active</option>
                        <option value="0" selected>UnActive</option>
                    @endif
                </select>
                @error('status')
                    <p class="text-danger">{{$message}}</p>
                @enderror
        </div>
        </div>
        
        <button type="submit" class="btn btn-primary me-2">Update</button>
        <button class="btn btn-light">Cancel</button>
    </form>    

@endsection