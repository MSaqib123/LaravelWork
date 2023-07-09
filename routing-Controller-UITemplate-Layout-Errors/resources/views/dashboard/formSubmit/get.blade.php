@extends("layout.dashboard")

@section("content")

  <h2>For Get Request</h2>
  
  <form action="" class="forms-sample">

    <div class="form-group row">
      <label for="exampleInputUsername2" class="col-sm-2 col-form-label">UserName</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" name="userName">
      </div>
    </div>

    <div class="form-group row">
      <label for="exampleInputEmail2" class="col-sm-2 col-form-label">FatherName</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="FatherName" name="fatherName">
      </div>
    </div>

    <div class="form-group row">
      <label for="exampleInputMobile" class="col-sm-2 col-form-label">Age</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="exampleInputMobile" placeholder="Age" name="age">
      </div>
    </div>

    <button type="submit" class="btn btn-primary me-2">Submit</button>
    <button class="btn btn-light">Cancel</button>
  </form>



@endsection