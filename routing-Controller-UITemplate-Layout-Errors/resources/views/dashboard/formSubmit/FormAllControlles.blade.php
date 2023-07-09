@extends("layout.dashboard")

@section("content")

    <h2>Form All Controll</h2>
    <br>

    <form method="POST" action="{{url('/class3/_3_FormAllControllesPost')}}" enctype="multipart/form-data">
      @csrf
      <!--____________ 1. Usernmae , fName , age __________-->
        <div class="form-group row">
          <label for="exampleInputUsername2" class="col-sm-2 col-form-label">UserName</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" value="{{old('userName')}}" id="exampleInputUsername2" placeholder="Username" name="userName">
            @error('userName')
              <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
          
        </div>
    
        <div class="form-group row">
          <label for="exampleInputEmail2" class="col-sm-2 col-form-label">FatherName</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" value="{{old('fatherName')}}" id="exampleInputEmail2" placeholder="fName" name="fatherName">
            @error('fatherName')
              <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="email1" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" value="{{old('email')}}" id="email1" placeholder="email1" name="email">
            @error('email')
              <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
        </div>
    
        <div class="form-group row">
          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Age</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" value="{{old('age')}}" id="exampleInputMobile" placeholder="Age" name="age">
            @error('age')
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

        <!--____________ 3. Select __________-->
        <div class="form-group row">
          <label for="selectInput" class="col-sm-2 col-form-label">Country</label>
          <div class="col-sm-9">
            <select id="selectInput" name="country" class="form-control form-select" value="{{old('country')}}">
              <option value="" selected>------- Select ----------</option>
                <option value="Pakistan">Pakistan</option>
              <option value="India">India</option>
              <option value="Srilanka">Srilanka</option>
              <option value="England">England</option>
              <option value="Australia">Australia</option>
            </select>
            @error('country')
              <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
        </div>
    
        <!--____________ 5. checkbox __________-->
        <div class="form-group row">
          <label for="sub1" class="col-sm-2 col-form-label">Subjects</label>
          <div class="col-sm-9 mt-3">
            <label><input type="checkbox" id="sub1" placeholder="Age" name="Subject[]" value="C#">&nbsp; C# </label>&nbsp; &nbsp; 
            <label><input type="checkbox" id="sub2" placeholder="Age" name="Subject[]" value="PHP">&nbsp; PHP </label>&nbsp; &nbsp; 
            <label><input type="checkbox" id="sub3" placeholder="Age" name="Subject[]" value="Laravel">&nbsp; Laravel </label>
            @error('Subject')
              <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
        </div>

        <!--____________ 6. Image __________-->
        <div class="form-group row">
          <label for="sub1" class="col-sm-2 col-form-label">Image</label>
          <div class="col-sm-9">
            <input type="file" name="img" class="form-control" multiple/>
          </div>
        </div>

        <!--____________ 6. Password , confumr Password __________-->
        <div class="form-group row">
          <label for="pass" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="pass" placeholder="password" name="password">
            @error('password')
              <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="conPass" class="col-sm-2 col-form-label">Confirm Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control"  id="conPass" placeholder="confirm password" name="conPassword">
            @error('conPassword')
              <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
        </div>



        
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button class="btn btn-light">Cancel</button>
    </form>    

@endsection