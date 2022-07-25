@extends('layout')
@section('header') <h3>Change Profile Password</h3> @endsection
@section('body')
<div class="row">
    <div id="errorMessage"></div>
    <div class="col-sm-6 offset-sm-3" style="margin-top:3%;">
        <form action="#" id="passwordChangeForm">
            @csrf
            <div class="form-group row">
                <label class="col-sm-3">Email Address:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control cardBorder" id="email" name="email" placeholder="Enter Your Email.">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3">Old Password:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control cardBorder" id="old_password" name="old_password" placeholder="Enter Your Old Password.">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3">New Password:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control cardBorder" id="new_password" name="new_password" placeholder="Give Your New Password.">
                </div>
            </div>
            <input type="submit" class="btn btn-lg navbgclr fntclr mt-3" id="btnsubmit" name="btnsubmit">
        </form>
    </div>
</div>
@endsection
@section('js')
<script>
    var passwordChangeForm = document.getElementById("passwordChangeForm");
    passwordChangeForm.addEventListener("submit", function(e){
        let error_meassage = document.getElementById("errorMessage");
        let message_p = document.createElement('p');

        e.preventDefault();

        /**यहां पर हम value को Name से get कर रहे हैं न कि id से इस लिए यहां पर हम token को असानी से प्राप्‍त कर पा रहे हैं।*/
        let email_Address = passwordChangeForm.email.value;
        let csrf_Token = passwordChangeForm._token.value;
        console.log(csrf_Token);
        let old_Password = passwordChangeForm.old_password.value;
        let new_Password = passwordChangeForm.new_password.value;

        let validationArray = [email_Address, old_Password, new_Password];
        let validationArrayLength = validationArray.length;
        let result=true;
        let count = 0;
        for(let checkValid = 0; checkValid < validationArrayLength; checkValid++){
            if(validationArray[checkValid] == ""){
                count++;
                result = false;
            }
        }

        if(count>0){            
            message_p.style.color = "red";
            message_p.style.fontSize = "20px";
            message_p.style.fontFamily = "cursive";
            message_p.style.border = "1px solid red";
            message_p.style.padding = "12px";
            message_p.style.textAlign = "center";
            message_p.style.borderRadius = "7px";
            message_p.style.boxShadow = "5px 5px 7px red";
            message_p.style.display = "block";

            message_p.innerHTML = "Sorry! Your " + count + " Field/Fields are empty.";
            error_meassage.className = "col-sm-6 offset-sm-3";
            error_meassage.appendChild(message_p);

            setTimeout(() => {
                message_p.style.display = "none";
            }, 4000);
        }
        if(result == true){
            let data = {emailAddress:email_Address, oldPassword: old_Password, newPassword: new_Password};
            console.log(data);
            data = JSON.stringify(data);

            let req = new XMLHttpRequest();

            req.open("POST", "{{ url('password_update') }}", true);
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            req.setRequestHeader("X-CSRF-TOKEN", csrf_Token);
            req.send("data="+data);

            req.onreadystatechange = function(){
                if(req.readyState == 4 && req.status == 200){
                    let scs = JSON.parse(req.responseText);

                    message_p.style.color = "green";
                    message_p.style.fontSize = "20px";
                    message_p.style.fontFamily = "cursive";
                    message_p.style.border = "1px solid green";
                    message_p.style.padding = "12px";
                    message_p.style.textAlign = "center";
                    message_p.style.borderRadius = "7px";
                    message_p.style.boxShadow = "5px 5px 7px green";
                    message_p.style.display = "block";
                    message_p.textContent = scs.success;
                    error_meassage.className = "col-sm-6 offset-sm-3";
                    error_meassage.appendChild(message_p);

                    setTimeout(() => {
                        message_p.style.display = "none";
                    }, 4000);
                }
            }
        }
    });
</script>
@endsection