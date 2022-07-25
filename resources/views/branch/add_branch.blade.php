@extends('layout')
@section('body')
  @section('header') <h3>Add Branch Details</h3> @endsection
  @if(session('info'))
    <div class="alert alert-success">
      {{ session('info') }}
    </div>
  @endif
  <form method="get" action="{{ 'insert' }}">
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Company Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Your Company Name.">
        <span class="alert-danger"><?php echo $errors->first('company_name');?></span>
      </div>
    </div>

    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Branch Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Enter Your Branch Name.">
        <span class="alert-danger"><?php echo $errors->first('branch_name');?></span>
      </div>
    </div>
    
    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Owner Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="owner_name" name="owner_name" placeholder="Enter Owner Name.">
        <span class="alert-danger"><?php echo $errors->first('owner_name');?></span>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Contact No</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Enter Your Contact Number.">
        <span class="alert-danger"><?php echo $errors->first('contact_no');?></span>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">pincode</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Your City Pincode.">
        <span class="alert-danger"> <?php echo $errors->first('pincode');?></span>
      </div>
      <label for="inputPassword" class="col-sm-2 col-form-label">City Name</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" list="city_list" id="city_name" name="city_name" placeholder="Enter Your City Name.">
        <datalist id="city_list"></datalist>
        <span class="alert-danger"><?php echo $errors->first('city_name');?></span>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">District Name</label>
      <div class="col-sm-4">
        <input type="text" readonly class="form-control" id="district_name" name="district_name" placeholder="Enter Your District Name.">
        <span class="alert-danger"><?php echo $errors->first('district_name');?></span>
      </div>
      <label for="inputPassword" class="col-sm-2 col-form-label">Region Name</label>
      <div class="col-sm-4">
        <input type="text" readonly class="form-control" id="region_name" name="region_name" placeholder="Enter Your Region Name.">
        <span class="alert-danger"><?php echo $errors->first('region_name');?></span>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">State Name</label>
      <div class="col-sm-4">
        <input type="text" readonly class="form-control" id="state_name" name="state_name" placeholder="Enter Your State Name.">
        <span class="alert-danger"><?php echo $errors->first('state_name');?></span>
      </div>
      <label for="inputPassword" class="col-sm-2 col-form-label">Contry Name</label>
      <div class="col-sm-4">
        <input type="text" readonly class="form-control" id="contry_name" name="contry_name" placeholder="Enter Your Contry Name.">
        <span class="alert-danger"><?php echo $errors->first('contry_name');?></span>
      </div>
    </div> 
    <button type="submit" class="btn btn-lg navbgclr fntclr">Submit</button>
  </form>

  @section('js')
    <script>
      document.getElementById("pincode").onchange = function () {
        // get the element from id.
        var pincode = document.getElementById('pincode').value;
        var cityList = document.getElementById('city_list');
        var district_name = document.getElementById("district_name");
        var region_name = document.getElementById("region_name");
        var state_name = document.getElementById("state_name");
        var contry_name = document.getElementById("contry_name");
        
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