@extends('layout')
@section('header') <h3>Update Employee Details</h3>@endsection
@section('body')

@if($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<form action="{{ 'update_details' }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h5 for="formGroupExampleInput" class="mb-4">Employee Personal and Login Detials:</h5>
    <div class="row">
        <label for="formGroupExampleInput" class="col-sm-2">Personal Detials:</label>
        <div class="col-sm-3">
            <div class="form-group">
                <input type="hidden" id="hide_id" name="hide_id">
                <input type="text" class="form-control" list="employeeList" id="empName" name="empName" placeholder="Employee Name">
                <div class="alert-danger"><?= $errors->first('empName'); ?></div>
                <datalist id="employeeList"></datalist>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" id="empContact" name="empContact" placeholder="Employee Contact No.">
                <div class="alert-danger"><?= $errors->first('empContact'); ?></div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <!-- <input type="text" class="form-control" id="empName" name="empName" placeholder="Employee Name"> -->
                <select class="form-control" id="empGender" name="empGender">
                    <option selected>Select Employee Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <label for="formGroupExampleInput" class="col-sm-2">Login Details:</label>
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" id="empEmail" name="empEmail" placeholder="Employee email">
                <div class="alert-danger"><?= $errors->first('empEmail'); ?></div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" id="empPassword" name="empPassword" placeholder="Employee Password">
                <div class="alert-danger"><?= $errors->first('empPassword'); ?></div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <!-- <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input"> -->
                <select class="form-control" id="empRoll" name="empRoll">
                    <option selected>Employee Categorie.</option>
                    <option>Owner</option>
                    <option>Querier Taker Boy</option>
                    <option>Diliver Boy</option>
                    <option>Office Boy</option>
                </select>
            </div>
        </div>
    </div><hr>
    <h5 for="formGroupExampleInput" class="mb-4">Employee Permanent Address:</h5>
    <div class="row">
        <label for="formGroupExampleInput" class="col-sm-2">Pincode:</label>
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" id="empPincode" name="empPincode" placeholder="Enter Pincode">
                <div class="alert-danger"><?= $errors->first('empPincode'); ?></div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" list="cityList" id="empCity" name="empCity" placeholder="Select Your City">
                <div class="alert-danger"><?= $errors->first('empCity'); ?></div>
                <datalist id="cityList"></datalist>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" id="empDistrict" name="empDistrict" readonly>
                <div class="alert-danger"><?= $errors->first('empDistrict'); ?></div>
            </div>
        </div>
    </div>
    <div class="row">
        <label for="formGroupExampleInput" class="col-sm-2"></label>
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" id="empRegion" name="empRegion" readonly>
                <div class="alert-danger"><?= $errors->first('empRegion'); ?></div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" id="empState" name="empState" readonly>
                <div class="alert-danger"><?= $errors->first('empState'); ?></div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" id="empContry" name="empContry" readonly>
                <div class="alert-danger"><?= $errors->first('empContry'); ?></div>
            </div>
        </div>
    </div><hr>
    <h5 for="formGroupExampleInput" class="mb-4">Employee Date of Birth, Date of Joining:</h5>
    <div class="row">
        <label for="formGroupExampleInput" class="col-sm-2">Date Of Birth:</label>
        <div class="col">
            <div class="form-group">
                <input type="date" class="form-control" id="empDOB" name="empDOB">
                <div class="alert-danger"><?= $errors->first('empDOB'); ?></div>
            </div>
        </div>
    </div>
    <div class="row">
        <label for="formGroupExampleInput" class="col-sm-2">Date Of Joining:</label>
        <div class="col">
            <div class="form-group">
                <input type="date" class="form-control" id="empDOJ" name="empDOJ">
                <div class="alert-danger"><?= $errors->first('empDOJ'); ?></div>
            </div>
        </div>
    </div><hr>
    <h5 for="formGroupExampleInput" class="mb-4">Update Employee Signature:</h5>
    <div class="row">
        <div class="col">
            <label for="formGroupExampleInput">Update Signature:</label>
            <div class="form-group">
                <img id="tableImage" class="img-thumbnail" height="100px" width="100px"><br>
                <input type="file" class="form-control-file" id="empSignature" name="empSignature">
                <input type="hidden" name="hide_image" id="hide_image">
                <div class="alert-danger"><?= $errors->first('empSignature'); ?></div>
            </div>
        </div>
    </div><hr>
    <button type="submit" class="btn btn-lg navbgclr fntclr">Submit</button>
</form>

@section('js')
    <script>
       document.getElementById("empName").onkeyup = function(){
            var empName = document.getElementById("empName").value;
            var employeeList = document.getElementById("employeeList");
            var hide_id = document.getElementById("hide_id");
            var empContact = document.getElementById("empContact");
            var empGender = document.getElementById("empGender");
            var empEmail = document.getElementById("empEmail");
            var empPassword = document.getElementById("empPassword");
            var empRoll = document.getElementById("empRoll");
            var empPincode = document.getElementById("empPincode");
            var empCity = document.getElementById("empCity");
            var empDistrict = document.getElementById("empDistrict");
            var empRegion = document.getElementById("empRegion");
            var empState = document.getElementById("empState");
            var empContry = document.getElementById("empContry");
            var empDOB = document.getElementById("empDOB");
            var empDOJ = document.getElementById("empDOJ");
            var empSignature = document.getElementById("empSignature");
            var req = new XMLHttpRequest();
            
            var data = {"empName":empName}
            data = JSON.stringify(data);

            let url = '{{ url("edit_employee") }}'
            req.open("get", url+"?empName="+data, true);
            req.send();

            if(empName != ""){
                employeeList.innerHTML = "";
                req.onreadystatechange = function(){
                    if(req.readyState == 4 && req.status == 200){
                        var data1=JSON.parse(req.responseText);
                        for(let i = 0; i < data1["data"].length; i++){
                            var options = document.createElement("option");
                            options.value = data1["data"][i]["emp_name"];
                            employeeList.appendChild(options);
                            hide_id.value = data1["data"][i]["emp_id"];
                            empContact.value = data1["data"][i]["emp_contact"];
                            empGender.value = data1["data"][i]["emp_gender"];
                            empRoll.value = data1["data"][i]["emp_roll"];
                            empEmail.value = data1["data"][i]["emp_email"];
                            empPassword.value = data1["data"][i]["emp_password"];
                            empPincode.value = data1["data"][i]["emp_pincode"];
                            empCity.value = data1["data"][i]["emp_city"];
                            empDistrict.value = data1["data"][i]["emp_district"];
                            empRegion.value = data1["data"][i]["emp_region"];
                            empState.value = data1["data"][i]["emp_state"];
                            empContry.value = data1["data"][i]["emp_contry"];
                            empDOB.value = data1["data"][i]["emp_dob"];
                            empDOJ.value = data1["data"][i]["emp_doj"];

                            document.getElementById("tableImage").src = data1["data"][i]["emp_signature"];                            
                            hide_image.value = data1["data"][i]["emp_signature"];
                        }
                    }
                }
            }else{
                hide_id.value =""; 
                empContact.value =""; 
                empGender.value = "";
                empRoll.value = "";
                empEmail.value = "";
                empPassword.value = "";
                empPincode.value = "";
                empCity.value = "";
                empDistrict.value = "";
                empRegion.value = "";
                empState.value = "";
                empContry.value = "";
                empDOB.value = "";
                empDOJ.value = "";
                empSignature.value = "";
            }
       }

       document.getElementById("empPincode").onchange = function () {
        // get the element from id.
        var pincode = document.getElementById('empPincode').value;
        var cityList = document.getElementById('cityList');
        var district_name = document.getElementById("empDistrict");
        var region_name = document.getElementById("empRegion");
        var state_name = document.getElementById("empState");
        var contry_name = document.getElementById("empContry");
        
        if(pincode != ""){
          // Create Object of xmLhttprequest().
          var req = new XMLHttpRequest();

          // Create url and send data.
          let url = '{{ URL::to("address") }}'
          req.open('GET', url+'?pincode='+pincode, true);
          req.send();

          // when Url found and get the data successfully then this block code run.
          req.onreadystatechange = function(){
            if(req.readyState == 4 && req.status == 200){
              var reqSuccess = JSON.parse(req.responseText);
              // catch the json key.
              var postOffice = reqSuccess.response["PostOffice"];
              var message = reqSuccess.response["Message"];

              // check if the message return No data found so else part is executed.
                if(message != "No records found"){
                  // Clear the datalist from this command.
                  cityList.innerHTML = " ";
                  // fetch the data from json which is send by the contraller.
                  for(let i = 0; i < postOffice.length; i++){
                    // create option element.
                    var option = document.createElement('option');
                    // insert value in the datalist Option.
                    option.value = postOffice[i]['Name'];
                    // append the option in datalist.
                    cityList.appendChild(option);

                    // insert value in input Element.
                    district_name.value = postOffice[i]['District'];
                    region_name.value = postOffice[i]['Region'];
                    state_name.value = postOffice[i]['State'];
                    contry_name.value = postOffice[i]['Country'];
                  }
                }
            }
          }
        }else{
          district_name.value = " ";
          region_name.value = " ";
          state_name.value = " ";
          contry_name.value = " ";
        }
      }
    </script>
@endsection
@endsection