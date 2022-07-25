@extends('layout')
@section('header') 
<h3>Edit reciever details</h3>
@endsection
@section('body')
@if(session('information'))
    <div class="alert alert-success">
        {{ session('information') }}
    </div>
@endif
<form action="{{ url('reciever_update') }}" method="post">
@csrf
    <div class="row">
        <label for="" class="col-sm-2">Reciever Name:</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="hidden" id="hide_id" name="hide_id">
                <input type="text" class="form-control" list="reciever_list" id="reciever_name" name="reciever_name" placeholder="Reciver name">
                <datalist id="reciever_list"></datalist>
            </div>
        </div>
    </div>
    <div class="row">
        <label for="" class="col-sm-2">Reciever Email:</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" id="reciever_email" name="reciever_email" placeholder="Reciver email">
                <?php echo $errors->first('reciever_email');?>
            </div>
        </div>
    </div>
    <div class="row">
        <label for="" class="col-sm-2">Reciever Contact:</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" id="reciever_contact" name="reciever_contact" placeholder="Reciver contact">
                <?php echo $errors->first('reciever_contact');?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="">Pincode:</label>
                <input type="text" class="form-control" id="reciever_pincode" name="pincode" placeholder="living zip code">
                <?php echo $errors->first('pincode');?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="">City name:</label>
                <input type="text" class="form-control" id="reciever_city_name" name="city_name" placeholder="city name">
                <?php echo $errors->first('city_name');?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="">District name</label>
                <input type="text" class="form-control" id="reciever_dist_name" name="dist_name" placeholder="district name">
                <?php echo $errors->first('dist_name');?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="">rigion name</label>
                <input type="text" class="form-control" id="reciever_region_name" name="region_name" placeholder="region name">
                <?php echo $errors->first('region_name');?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="">state name</label>
                <input type="text" class="form-control" id="reciever_state_name" name="state_name" placeholder="state name">
                <?php echo $errors->first('state_name');?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="">contry name:</label>
                <input type="text" class="form-control" id="reciever_cont_name" name="cont_name" placeholder="contry name">
                <?php echo $errors->first('cont_name');?>
            </div>
        </div>
    </div>
    <input type="submit" value="Add new" class="btn btn-lg navbgclr fntclr">
</form>
@endsection
@section('js')
<script>
document.getElementById("reciever_name").onkeyup = function(){
    let recieverName = document.getElementById("reciever_name").value;
    let recieverList = document.getElementById("reciever_list");
    let hide_id = document.getElementById("hide_id");
    let recieverContact = document.getElementById("reciever_contact");
    let recieverEmail = document.getElementById("reciever_email");
    let recieverPincode = document.getElementById("reciever_pincode");
    let recieverCity = document.getElementById("reciever_city_name");
    let recieverDistrict = document.getElementById("reciever_dist_name");
    let recieverRegion = document.getElementById("reciever_region_name");
    let recieverState = document.getElementById("reciever_state_name");
    let recieverContry = document.getElementById("reciever_cont_name");

    let csrf_Token = document.getElementsByName("_token")[0].value;
    var req = new XMLHttpRequest();

    var data = {"recieverName":recieverName}
    data = JSON.stringify(data);

    req.open("post", "{{ url('reciever_edit') }}");
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req.setRequestHeader("X-CSRF-TOKEN", csrf_Token);
    req.send("data="+data);

    if(recieverName != ""){
        recieverList.innerHTML = "";
        req.onreadystatechange = function(){
            if(req.readyState == 4 && req.status == 200){
                var data1=JSON.parse(req.responseText);
                for(let i = 0; i < data1["data"].length; i++){
                    var options = document.createElement("option");
                    options.value = data1["data"][i]["reciever_name"];
                    recieverList.appendChild(options);
                    hide_id.value = data1["data"][i]["reciever_id"];
                    recieverContact.value = data1["data"][i]["reciever_contact"];
                    recieverEmail.value = data1["data"][i]["reciever_email"];
                    recieverPincode.value = data1["data"][i]["pincode"];
                    recieverCity.value = data1["data"][i]["city"];
                    recieverDistrict.value = data1["data"][i]["district"];
                    recieverRegion.value = data1["data"][i]["region"];
                    recieverState.value = data1["data"][i]["state"];
                    recieverContry.value = data1["data"][i]["contry"];
                }
            }
        }
    }else{
        hide_id.value =""; 
        recieverContact.value =""; 
        recieverEmail.value = "";
        recieverPincode.value = "";
        recieverCity.value = "";
        recieverDistrict.value = "";
        recieverRegion.value = "";
        recieverState.value = "";
        recieverContry.value = "";
    }
}
</script>
@endsection