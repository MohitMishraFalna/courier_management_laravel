@extends('layout')
@section('body')
  @section('header') <h3>Update Branch Details</h3> @endsection
  @if(session('information'))
    <div class="alert alert-success">
      {{ session('information') }}
    </div>
  @endif
  <form action="{{ 'update' }}" method="get">
  <!-- <meta name="csrf-token" id="csrf" content="{{ csrf_token() }}"> -->
  <!-- @csrf -->
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Company Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" list="company_list" id="company_name" name="company_name" placeholder="Enter Your Company Name For Update Your Details.">
        <datalist id="company_list" size="5"></datalist>
      </div>
    </div>

    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Branch Name is</label>
      <div class="col-sm-10" id="forminput">
        <input type="text" class="form-control" id="branch_name" name="branch_name" value="">
        <input type="hidden" class="form-control" id="branch_id" name="branch_id" value="">
      </div>
    </div>
    
    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Owner Name is</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="owner_name" name="owner_name">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Contact No is</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="contact_no" name="contact_no">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">pincode</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="pincode" name="pincode">
      </div>
      <label for="inputPassword" class="col-sm-2 col-form-label">City Name</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" list="city_list" id="city_name" name="city_name">
        <datalist id="city_list"></datalist>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">District Name</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="district_name" name="district_name">
      </div>
      <label for="inputPassword" class="col-sm-2 col-form-label">Region Name</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="region_name" name="region_name">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">State Name is</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="state_name" name="state_name">
      </div>
      <label for="inputPassword" class="col-sm-2 col-form-label">Contry Name is</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="contry_name" name="contry_name">
      </div>
    </div> 
    <button type="submit" class="btn btn-lg navbgclr fntclr">Submit</button>
  </form>

  @section('js')
    <script>
      function getId(){
        var cn = document.getElementById('company_name').value;
        var branch_name = document.getElementById("branch_name");
        var branch_id = document.getElementById("branch_id");
        var owner_name = document.getElementById("owner_name");
        var contact_no = document.getElementById("contact_no");
        var pincon = document.getElementById("pincode");
        var city_name = document.getElementById("city_name");
        var district_name = document.getElementById("district_name");
        var region_name = document.getElementById("region_name");
        var state_name = document.getElementById("state_name");
        var contry_name = document.getElementById("contry_name");
        var idValue = {'cn': cn, 'branch_name':branch_name, 'branch_id':branch_id, 'owner_name':owner_name,
                        'contact_no': contact_no, 'pincon': pincon, 'city_name': city_name, 
                        'district_name':district_name, "region_name":region_name, 'state_name':state_name, 'contry_name':contry_name 
                      }
        return idValue;
      }
      function getdata(){
        var value = getId();
        var data = {'cn':value.cn};
        
        data = JSON.stringify(data);
        
        if(value.cn !== ""){
          var req = new XMLHttpRequest();
        
          let url = '{{ url("edit")}}'
          req.open('get', url+'?name='+data, true);
          req.send();

          req.onreadystatechange = function(){
            if(req.readyState == 4 && req.status == 200){

              var return_result = JSON.parse(req.responseText);
              console.log(return_result);
              var company_list = document.getElementById("company_list");

              company_list.innerHTML = " ";
              for(let i=0; i < return_result["data"].length; i++){
                var option = document.createElement("option");
                option.value = return_result["data"][i]["company_name"];
                company_list.appendChild(option);
                value.branch_id.value = return_result["data"][i]["id"];
                value.branch_name.value = return_result["data"][i]["branchname"];
                value.owner_name.value = return_result["data"][i]["ownername"];
                value.contact_no.value = return_result["data"][i]["contact_no"];
                value.pincon.value = return_result["data"][i]["pincode"];
                value.city_name.value = return_result["data"][i]["city_name"];
                value.district_name.value = return_result["data"][i]["district_name"];
                value.region_name.value = return_result["data"][i]["region_name"];
                value.state_name.value = return_result["data"][i]["state_name"];
                value.contry_name.value = return_result["data"][i]["contry_name"];
              }              
            }
          }
        }else{          
          value.branch_name.value = " ";
          value.owner_name.value = " ";
          value.contact_no.value = " ";
          value.pincon.value = " ";
          value.city_name.value = " ";
          value.district_name.value = " ";
          value.region_name.value = " ";
          value.state_name.value = " ";
          value.contry_name.value = " ";
        }
      }
      document.getElementById('company_name').onkeyup = getdata;
    </script>
  @endsection
@endsection