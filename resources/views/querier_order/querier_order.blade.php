@extends('layout')
@section('header') 
<h3>Take details for querier send</h3>
@endsection
@section('body')
<div class="card-group">
    <div class="card cardmargin cardbordercolor">
        <div class="card-header">
            <h5>Sender Details</h5>
        </div>
        <div class="card-body">
            @if(session('info'))
                <div class="alert alert-success">
                    {{ session('info') }}
                </div>
            @endif
            <form action="{{ url('sender_add') }}" method="post">
                @csrf
                <div class="row">
                    <label for="" class="col-sm-4">Sender Name:</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                        <input type="hidden" id="hide_id" name="hide_id">
                        <input type="text" class="form-control" list="sender_list" id="sender_name" name="sender_name" placeholder="Sender name">
                        <datalist id="sender_list"></datalist>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="" class="col-sm-4">Sender Email:</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <input type="text" class="form-control" id="sender_email" name="sender_email" placeholder="Sender email">
                            <?php echo $errors->first('sender_email');?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Sender Contact:</label>
                            <input type="text" class="form-control" id="sender_contact" name="sender_contact" placeholder="Sender contact">
                            <?php echo $errors->first('sender_contact');?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Sender Due:</label>
                            <input type="text" class="form-control" id="sender_due" name="sender_due" placeholder="Sender due">
                            <?php echo $errors->first('sender_due');?>
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
                            <input type="text" class="form-control" list="cityList" id="sender_city_name" name="city_name" placeholder="city name">
                            <datalist id="cityList"></datalist>
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
        </div>
    </div>        
    <div class="card .cardmargin cardbordercolor">
        <div class="card-header">
            <h5>Reciever Details</h5>
        </div>
        <div class="card-body">
            @if(session('information'))
                <div class="alert alert-success">
                    {{ session('information') }}
                </div>
            @endif
            <form action="{{ url('reciever_add') }}" method="post">
            @csrf
                <div class="row">
                    <label for="" class="col-sm-4">Reciever Name:</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                        <input type="hidden" id="reci_hide_id" name="reci_hide_id">
                        <input type="text" class="form-control" list="reciever_list" id="reciever_name" name="reciever_name" placeholder="Reciver name">
                        <datalist id="reciever_list"></datalist>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="" class="col-sm-4">Reciever Email:</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <input type="text" class="form-control" id="recievermail" name="reciever_email" placeholder="Reciver email">
                            <?php echo $errors->first('reciever_email');?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="" class="col-sm-4">Reciever Contact:</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <input type="text" class="form-control" id="recievertact" name="reciever_contact" placeholder="Reciver contact">
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
                            <input type="text" class="form-control" list="cityList1" id="reciever_city_name" name="city_name" placeholder="city name">
                            <datalist id="cityList1"></datalist>
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
        </div>
    </div>
</div>
<!-- contenteditable="true" -->
<div class="row">
    <div class="col">
        <div class="card cardbordercolor">
            <div class="card-header">
                <h5>Querier Details</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center" id="myTable">
                    <thead>
                        <tr>
                            <th width="20%">Qourier name</th>
                            <th width="20%">Type</th>
                            <th width="20%">Subtype</th>
                            <th width="10%">Weight</th>
                            <th width="10%">Quantity</th>
                            <th width="10%">Price</th>
                            <th width="10%">Total</th>
                            <th width="10%">Row+</th>
                        </tr>
                    </thead>
                    <tbody id="dynmicTable">
                        <tr>
                            <td contenteditable="true" id="prod_name" class="product_name"></td>
                            <td id="qourier_type" class="td_qourier_type">
                                <select name=""  id="select_qourier_type" class="form-control" >
                                    <option value="">----</option>
                                    <option value="container">Container</option>
                                    <option value="packet">Packet</option>
                                    <option value="envelope">envelope</option>
                                </select>
                            </td>
                            <td id="qourier_subtype" class="td_qourier_subtype">
                                <select name=""  id="select_subtype" class="form-control" >
                                </select>
                            </td>
                            <td contenteditable="true" id="prod_weight" class="prod_weight"></td>
                            <td contenteditable="true" id="prod_qty" class="prod_qty"></td>
                            <td contenteditable="true" id="price" class="price"></td>
                            <td id="total_amt" class="total_amt"></td>
                            <td><button id="new_row" class="new_row btn-info btn">Add</button></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Grand Total: </th> <td id="grandTotal"></td>
                            <th>Paid Amount: </th> <td contenteditable="True" id="paid_amt"></td>
                            <th width="20%">Due Amount: </th> <td id="due_amt"></td>
                        </tr>
                    </tfoot>
                </table>
                <button id="order_submit" class="new_row btn btn-lg navbgclr fntclr float-right">Order submit</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    // get sender details
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
        let senderDue = document.getElementById("sender_due");

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
                        senderDue.value = data1["data"][i]["total_due"];
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
            senderDue.value = "";
        }
    }
    
    // get receiver details
    document.getElementById("reciever_name").onkeyup = function(){
        let recieverName = document.getElementById("reciever_name").value;
        let recieverList = document.getElementById("reciever_list");
        let hide_id = document.getElementById("reci_hide_id");
        let recieverContact = document.getElementById("recievertact");
        let recieverEmail = document.getElementById("recievermail");
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
    
    // get address sender
    document.getElementById("sender_pincode").onchange = function () {
        // get the element from id.
        var pincode = document.getElementById('sender_pincode').value;
        var cityList = document.getElementById('cityList');
        var district_name = document.getElementById("sender_dist_name");
        var region_name = document.getElementById("sender_region_name");
        var state_name = document.getElementById("sender_state_name");
        var contry_name = document.getElementById("sender_cont_name");
        
        if(pincode != ""){
          // Create Object of xmLhttprequest().
          var req = new XMLHttpRequest();

          // Create url and send data.
          let url = '{{ url("address") }}'
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

    // get address receiver
    document.getElementById("reciever_pincode").onchange = function () {
        // get the element from id.
        var pincode = document.getElementById('reciever_pincode').value;
        var cityList = document.getElementById('cityList1');
        var district_name = document.getElementById("reciever_dist_name");
        var region_name = document.getElementById("reciever_region_name");
        var state_name = document.getElementById("reciever_state_name");
        var contry_name = document.getElementById("reciever_cont_name");
        
        if(pincode != ""){
          // Create Object of xmLhttprequest().
          var req = new XMLHttpRequest();

          // Create url and send data.
          let url = '{{ url("address") }}'
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

    // append subtype of qourier
    document.getElementById("select_qourier_type").onchange = function(){
        let qourier_type = document.getElementById("select_qourier_type").value;
        let qourier_subtype = document.getElementById("select_subtype");

        let container_Subtype = ["plastic container", "teen container"];
        let packet_Subtype = ["small packet", "large packet", "extra large packet"]
        let envolope_Subtype = ["small envelope", "large envelope", "extra large envelope"]
        
        qourier_subtype.innerHTML = "";
        if(qourier_type == "container"){
            for(let i = 0; i < container_Subtype.length; i++){
                let menuopt = document.createElement("option");
                menuopt.value = container_Subtype[i];
                menuopt.textContent = container_Subtype[i];
                qourier_subtype.appendChild(menuopt);
            }
        }
        
        if(qourier_type == "packet"){  
            for(let i = 0; i < packet_Subtype.length; i++){
                let menuopt = document.createElement("option");
                menuopt.value = packet_Subtype[i];
                menuopt.textContent = packet_Subtype[i];
                qourier_subtype.appendChild(menuopt);
            }
        }
        
        if(qourier_type == "envelope"){  
            for(let i = 0; i < envolope_Subtype.length; i++){
                let menuopt = document.createElement("option");
                menuopt.value = envolope_Subtype[i];
                menuopt.textContent = envolope_Subtype[i];
                qourier_subtype.appendChild(menuopt);
            }
        }
    }

    // create table row
    let count = 1;
    document.getElementById("new_row").addEventListener('click', function(e){
        // create table element 
        let dynmictr = document.getElementById("dynmicTable");
        let tr = document.createElement("tr");
        let td1 = document.createElement("td");
        let td2 = document.createElement("td");
        let td3 = document.createElement("td");
        let td4 = document.createElement("td");
        let td5 = document.createElement("td");
        let td6 = document.createElement("td");
        let td7 = document.createElement("td");
        let td8 = document.createElement("td");
        let btnNew = document.createElement("button");

        // attach id in every tr and td
        td1.id = "td1";
        td2.id = "td2";
        td3.id = "td3";
        td4.id = "td4";
        td5.id = "td5";
        td6.id = "td6";
        td7.id = "td7";
        tr.id="tr"+count++;

        // append class on delete button
        btnNew.className="btn btn-danger remove";
        btnNew.id="new_row"+count;

        // get data from td 
        btnNew.textContent = "D";
        td1.textContent = document.getElementById("prod_name").textContent;
        td2.textContent = document.getElementById("select_qourier_type").value;
        td3.textContent = document.getElementById("select_subtype").value;
        td4.textContent = document.getElementById("prod_weight").textContent;
        td5.textContent = document.getElementById("prod_qty").textContent;
        td6.textContent = document.getElementById("price").textContent;
        td7.textContent = document.getElementById("total_amt").textContent;

        // append in dynamic created td
        td8.appendChild(btnNew);
        tr.appendChild(td1)
        tr.appendChild(td2)
        tr.appendChild(td3)
        tr.appendChild(td4)
        tr.appendChild(td5)
        tr.appendChild(td6)
        tr.appendChild(td7)
        tr.appendChild(td8)
        dynmictr.appendChild(tr);

        // after click new button whole td will empty
        document.getElementById("prod_name").textContent = "";
        document.getElementById("prod_weight").textContent = "";
        document.getElementById("prod_qty").textContent = "";
        document.getElementById("price").textContent = "";
        document.getElementById("total_amt").textContent = "";
    });

    // add event listener on dynamic created button  
    let new_row = document.getElementById('new_row');
    new_row.addEventListener('click', function(){
        let remove = document.getElementsByClassName('remove');
        // take length from the class
        for(let i = 0; i < remove.length; i++){
            // attech event listenerr
            remove[i].onclick = function(){
                // get id from parent's parent node.
                let id = remove[i].parentNode.parentNode.getAttribute('id');
                let element = document.getElementById(id);
            }
        }

        // set focus again first td.
        document.getElementById('prod_name').focus();
    })

    // multiply qty and price
    let grandTotal = 0;
    document.getElementById('price').onkeyup = function(e){
        let price = document.getElementById('price').textContent;
        let qty = document.getElementById('prod_qty').textContent
        let grandTotalValue = document.getElementById('grandTotal');
        grandTotalValue.innerHTML = '';
        // if key code is doesn't match so action will not perform
        if(e.keyCode != 9 && e.keyCode == 13){
            let total = parseFloat(price)*parseInt(qty) 
            
            grandTotal = parseFloat(grandTotal) + parseInt(total)
            
            document.getElementById('total_amt').textContent = '';
            grandTotalValue.append(grandTotal)
            document.getElementById('total_amt').append(total)
            document.getElementById("new_row").focus();
        }

    }

    // substruct grand total and paid amout
    document.getElementById('paid_amt').onkeyup = function(e){
        let paid_amt = document.getElementById('paid_amt').textContent;
        let amountArandTotal = document.getElementById('grandTotal').textContent
        // if key code is doesn't match so action will not perform
        if(e.keyCode != 9){
            let total = parseFloat(amountArandTotal) - parseInt(paid_amt) 
                        
            document.getElementById('due_amt').textContent = '';
            document.getElementById('due_amt').append(total)
        }

    }

    // submit querier
    document.getElementById("order_submit").onclick = function(){
        let mytable = document.getElementById("myTable");
        let sender_id = document.getElementById("hide_id").value;
        let reciever_id = document.getElementById("reci_hide_id").value;
        let sender_due = document.getElementById("sender_due").value;
        let grandTotal = document.getElementById("grandTotal").textContent;
        let paidAmt = document.getElementById("paid_amt").textContent;
        let dueAmt = document.getElementById("due_amt").textContent;

        // mytable is our dom table and rows is a key which is get the whole table rows.
        let noOfRow = mytable.rows.length

        let prod_name = [];
        let prod_type = [];
        let prod_subtype = [];
        let prod_weight = [];
        let prod_qty = [];
        let prod_price = [];
        let total_amt = [];

        // when you will fixed increase row site in table, you must have to increase let r = size.
        for(let r=3; r<noOfRow; r++){
            // as many increase in r size that much decrease here tr + r size.
            let row =  document.getElementById("tr"+(r-2));

            prod_name.push(row.children[0].textContent);
            prod_type.push(row.children[1].textContent);
            prod_subtype.push(row.children[2].textContent);
            prod_weight.push(row.children[3].textContent);
            prod_qty.push(row.children[4].textContent);
            prod_price.push(row.children[5].textContent);
            total_amt.push(row.children[6].textContent);
        }

        let data={
            "sender_id":sender_id,
            "reciever_id":reciever_id ? reciever_id : 0,
            "prod_name":prod_name,
            "prod_type":prod_type,
            "prod_subtype":prod_subtype,
            "prod_weight":prod_weight,
            "prod_qty":prod_qty,
            "prod_price":prod_price,
            "total_amt":total_amt,
            "grand_total":grandTotal,
            "paid_amt":paidAmt,
            "due_amt":dueAmt,
        }

        data = JSON.stringify(data);
        
        let req = new XMLHttpRequest();
        req.open("get", "{{ url('ordercreate') }}?data="+data);
        req.send();

        req.onreadystatechange = function(data){
            if(req.readyState == 4 && req.status == 200){
                let url = "{{ url('printorder') }}";
                window.location.href=url;
            }
        }
    }
</script>
@endsection