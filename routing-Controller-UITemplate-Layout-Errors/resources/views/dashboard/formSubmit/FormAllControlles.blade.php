@extends("layout.dashboard")

@section("content")

    <h1>Form All Controll</h1>
    <br>

    <form method="POST" action="{{url('/class3/_3_FormAllControllesPost')}}">
        @csrf
        <!--____________ 1. Usernmae , fName , age __________-->
        <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-2 col-form-label">UserName</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" name="userName">
            </div>
          </div>
      
          <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">FatherName</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="exampleInputEmail2" placeholder="fName" name="fatherName">
            </div>
          </div>
      
          <div class="form-group row">
            <label for="exampleInputMobile" class="col-sm-2 col-form-label">Age</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="exampleInputMobile" placeholder="Age" name="age">
            </div>
          </div>

          <!--____________ 2. CheckBox __________-->
          <div class="form-group row">
            <label for="maleGender" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-9">
              <label><input type="radio" id="maleGender" placeholder="Age" name="Gender" value="M">&nbsp; Male </label>&nbsp; &nbsp; 
              <label><input type="radio" id="femaleGender" placeholder="Age" name="Gender" value="F">&nbsp; Female </label>
            </div>
          </div>

          <!--____________ 3. Select __________-->
          <div class="form-group row">
            <label for="selectInput" class="col-sm-2 col-form-label">Country</label>
            <div class="col-sm-9">
              <select id="selectInput" name="country" class="form-control form-select">
                <option value="" selected>------- Select ----------</option>
                <option value="Pakistan">Pakistan</option>
                <option value="India">India</option>
                <option value="Srilanka">Srilanka</option>
                <option value="England">England</option>
                <option value="Australia">Australia</option>
              </select>
            </div>
          </div>
      
          <!--____________ 5. checkbox __________-->
          <div class="form-group row">
            <label for="sub1" class="col-sm-2 col-form-label">Subjects</label>
            <div class="col-sm-9 mt-3">
              <label><input type="checkbox" id="sub1" placeholder="Age" name="Subject[]" value="C#">&nbsp; C# </label>&nbsp; &nbsp; 
              <label><input type="checkbox" id="sub2" placeholder="Age" name="Subject[]" value="PHP">&nbsp; PHP </label>&nbsp; &nbsp; 
              <label><input type="checkbox" id="sub3" placeholder="Age" name="Subject[]" value="Laravel">&nbsp; Laravel </label>
            </div>
          </div>

          <!--____________ 6. Image __________-->
          <div class="form-group row">
            <label for="sub1" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-9">
              <input type="file" name="img" class="form-control"/>
            </div>
          </div>

          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
    </form>    

@endsection