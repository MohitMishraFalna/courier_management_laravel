@extends('layout')
@section('header') 
<h3>Edit sender detials</h3>
@endsection
@section('body')
@if(session('information'))
    <div class="alert alert-success">
        {{ session('information') }}
    </div>
@endif
<form action="{{ url('sender_update') }}" method="post">
    @csrf
    <div class="row">
        <label for="" class="col-sm-2">Sender Name:</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="hidden" id="hide_id" name="hide_id">
                <input type="text" class="form-control" list="sender_list" id="sender_name" name="sender_name" placeholder="Sender name">
                <datalist id="sender_list"></datalist>
            </div>
        </div>
    </div>
    <div class="row">
        <label for="" class="col-sm-2">Sender Email:</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" id="sender_email" name="sender_email" placeholder="Sender email">
                <?php echo $errors->first('sender_email');?>
            </div>
        </div>
    </div>
    <div class="row">
        <label for="" class="col-sm-2">Sender Contact:</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input type="text" class="form-control" id="sender_contact" name="sender_contact" placeholder="Sender contact">
                <?php echo $errors->first('sender_contact');?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="">Pincode:</label>
                <input type="text" class="form-control" id="sender_pincode" name="pincode" placeholder="living zip code">
                <?php echo $errors->first('pincode');?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="">City name:</label>
                <input type="text" class="form-control" id="sender_city_name" name="city_name" placeholder="city name">
                <?php echo $errors->first('city_name');?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="">District name</label>
                <input type="text" class="form-control" id="sender_dist_name" name="dist_name" placeholder="district name">
                <?php echo $errors->first('dist_name');?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="">rigion name</label>
                <input type="text" class="form-control" id="sender_region_name" name="region_name" placeholder="region name">
                <?php echo $errors->first('region_name');?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="">state name</label>
                <input type="text" class="form-control" id="sender_state_name" name="state_name" placeholder="state name">
                <?php echo $errors->first('state_name');?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="">contry name:</label>
                <input type="text" class="form-control" id="sender_cont_name" name="cont_name" placeholder="contry name">
                <?php echo $errors->first('cont_name');?>
            </div>
        </div>
    </div>
    <input type="submit" value="Add new" class="btn btn-lg navbgclr fntclr">
</form>
@endsection
@section('js')
<script>
    document.getElementById("sender_name").onkeyup = function(){
            let senderName = document.getElementById("sender_name").value;
            let senderList = document.getElementById("sender_list");
            let hide_id = document.getElementById("hide_id");
            let senderContact = document.getElementById("sender_contact");
            let senderEmail = document.getElementById("sender_email");
            let senderPincode = document.getElementById("sender_pincode");
            let senderCity = document.getElementById("sender_city_name");
            let senderDistrict = document.getElementById("sender_dist_name");
            let senderRegion = document.getElementById("sender_region_name");
            let senderState = document.getElementById("sender_state_name");
            let senderContry = document.getElementById("sender_cont_name");

            let csrf_Token = document.getElementsByName("_token")[0].value;
            var req = new XMLHttpRequest();
            
            var data = {"senderName":senderName}
            data = JSON.stringify(data);

            req.open("post", "{{ url('sender_edit') }}");
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            req.setRequestHeader("X-CSRF-TOKEN", csrf_Token);
            req.send("data="+data);

            if(senderName != ""){
                senderList.innerHTML = "";
                req.onreadystatechange = function(){
                    if(req.readyState == 4 && req.status == 200){
                        var data1=JSON.parse(req.responseText);
                        for(let i = 0; i < data1["data"].length; i++){
                            var options = document.createElement("option");
                            options.value = data1["data"][i]["sender_name"];
                            senderList.appendChild(options);
                            hide_id.value = data1["data"][i]["sender_id"];
                            senderContact.value = data1["data"][i]["sender_contact"];
                            senderEmail.value = data1["data"][i]["sender_email"];
                            senderPincode.value = data1["data"][i]["pincode"];
                            senderCity.value = data1["data"][i]["city"];
                            senderDistrict.value = data1["data"][i]["district"];
                            senderRegion.value = data1["data"][i]["region"];
                            senderState.value = data1["data"][i]["state"];
                            senderContry.value = data1["data"][i]["contry"];
                        }
                    }
                }
            }else{
                hide_id.value =""; 
                senderContact.value =""; 
                senderEmail.value = "";
                senderPincode.value = "";
                senderCity.value = "";
                senderDistrict.value = "";
                senderRegion.value = "";
                senderState.value = "";
                senderContry.value = "";
            }
       }
</script>
@endsection