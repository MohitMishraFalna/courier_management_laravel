<!DOCTYPE html>
<html lang="en">
    <head>
        @yield('head')
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ url(asset('assest/bootstrap/css/bootstrap.min.css')) }}">
        <link rel="stylesheet" href="{{ url(asset('assest/bootstrap/css/dataTables.bootstrap4.min.css')) }}">
        <link rel="stylesheet" href="{{ url(asset('css/style.css')) }}">        
        <!-- <script src="{{ url(asset('assest/bootstrap/js/jquery.js')) }}"></script> -->
        <script src="{{ url(asset('assest/bootstrap/js/jquery-3.5.1.js')) }}"></script>
    </head>
    <body id="centerbody">
        <!-- <i class="fa fa-home"></i> this is for favicon -->
        <div class="leftSideBar">
            <h3 class="text-center mt-3 fntclr">Roll</h3>
            <div class="d-flex justify-content-center">
                <div class="img1 imginnercover">
                    <!-- <img src="{{ url('public/assest/bootstrap/img/profile1.jpg') }}"> -->
                    <img id="imgupd1" class="imgupd" src="{{ url('assest/images', session()->get('emp_image'))}}">
                    <div class="uploadsign">
                    <a class="btn btn-info" data-toggle="collapse" data-target="#linkdiv"><i class="fa fa-camera cmrastyle"></i></a>
                    <p>Upload Image</p>
                    </div>
                    
                </div> 
                <div id="linkdiv" class="collapse">
                    <ul id="imgpgslink" >
                        <!-- <li><a href="{{ url('Imageupload') }}">Upload Image</a></li> -->
                        <li><a class="removelinkproperty" id="uploadImage">Upload Image</a></li>
                        <li><a class="removelinkproperty" id="viewImage">View Image</a></li>
                        <li><a class="removelinkproperty" id="removeImage">Remove Image</a></li>
                    </ul>
                </div>             
            </div> 
            <h4 class="text-center mt-2 pb-3 fntclr" style="border-bottom: 2px double black">Name</h4>
            <div class="leftSidebarMenu">
                <ul>
                    <li><a href="{{ url('workbanch') }}" >Workbanck</a></li>
                    <li><a href="" >Employee</a>
                    @if(session()->get('emp_roll') == "Owner")
                        <ul>                            
                            <li><a href="{{ url('new_employee') }}">New Employee</a></li>
                            <li><a href="{{ url('edit_employee') }}">Update Employee</a></li>
                            <li><a href="{{ url('show_details') }} ">Employees Detail</a></li>
                        </ul>
                    @endif
                    </li>
                    <li><a href="">Branch</a>
                        @if(session()->get('emp_roll') == "Owner")
                            <ul>
                                <li><a href="{{ url('add_branch') }}">New Branch</a></li>
                                <li><a href="{{ url('update') }}">Update Branch</a></li>
                                <li><a href="{{ url('showbranchdetails') }}">Branch Details</a></li>
                            </ul>
                        @endif
                    </li>
                    <li><a href="">Customer</a>
                        <ul>
                            <li><a href="{{ url('sender_show') }}">Edit Sender</a></li>
                            <li><a href="{{ url('reciever_show') }}">Edit Reciever</a></li>
                        </ul>
                    </li>
                    <li><a href="">Courier</a>
                        @if(session()->get('emp_roll') == "Owner" || session()->get('emp_roll') == "Office Boy")
                            <ul>
                                <li><a href="{{ url('order') }}">Add Courier</a></li>
                                <li><a href="{{ url('order_list') }}">Order List</a></li>
                            </ul>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
        
        <div id="imageprocessing"></div> 

        <nav class="navbar navbar-expand-lg cardPosition cardTop navbgclr ">
            <a class="navbar-brand" href="#" style="color: lightskyblue;">CMS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <input class="form-control mb-1 mr-sm-2 col-sm-8" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            <div class="collapse navbar-collapse ml-5 d-flex justify-content-right " id="navbarSupportedContent">
                <div class="container">
                    <ul>
                        <li><a class="nav-link" href="#" style="color: lightskyblue;">Logout</a>
                            <ul>
                                <li><a href="{{ url('profile') }}">Profile Show</a></li>
                                <li><a href="{{ url('picture') }}">Update Picture</a></li>
                                <li><a href="{{ url('change') }}">Change Password</a></li>
                                <li><a href="{{ url('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>      
                </div>
            </div>
        </nav> 
        <div class="card cardPosition cardHeight boxshdow" id="maincard">
            <div class="card-header card-header1" id="cardHeader">
                @yield('header')
            </div>
            <div class="card-body card-body1" id="cardBody">
                @yield('body')
            </div>
        </div>
       <div class="footer cardPosition navbgclr">
           <p class="fntclr">Copyright@2019-20 From Mohit Mishra Falna</p>
       </div>
       @yield('js')	
       <script>
            //    Upload profile image in database.
            document.getElementById('uploadImage').onclick = function(){
                // get element by id.
                let imgprocessing = document.getElementById('imageprocessing');
                let imgulblock = document.getElementById('linkdiv');

                // create element.
                let mainCard = document.createElement('div');
                let cardHeader1 = document.createElement("div");
                let cardBody1 = document.createElement("div");
                let hidebtn = document.createElement("button");
                let upload_img_btn = document.createElement("button");
                let back_btn = document.createElement("button");
                let img_tag = document.createElement("img");
                let img_input_file = document.createElement("input");
                let inp_hidn_csrf = document.createElement("input");
                let upload_form = document.createElement("form");

                // empty parent element.
                imgprocessing.innerHTML = "";

                // add class in element.
                imgprocessing.className = "cover div_center";
                mainCard.className = "card div_center";
                cardHeader1.className = "card-header h1_made";
                cardBody1.className = "card-body text-center";
                hidebtn.className = "hide_btn hide_form";
                back_btn.className = "btn half_center btnSize btnback hide_form";
                img_tag.className = "div_center imgstyle img-thumbnail imgupd";
                upload_img_btn.className = "btn half_center btnSize btnimgupld";

                // add src and file.
                upload_form.enctype = "multipart/form-data";
                img_input_file.type = "file";
                img_input_file.name = "uploadfile";
                inp_hidn_csrf.type = "hidden";
                inp_hidn_csrf.name = "_token";
                inp_hidn_csrf.value = "{{ csrf_token() }}"
                img_tag.src = "{{ url('assest/images', session()->get('emp_image')) }}";

                // add id in element.
                img_input_file.id = "select_img_file";
                img_tag.id = "imgupd1";
                upload_img_btn.id = "img_file";
                upload_form.id = "upload_img"

                // add style in element.
                mainCard.style.width = "45%";
                mainCard.style.height = "60%";
                img_input_file.style.display = "none";

                // remove class.
                imgulblock.classList.remove("show");

                // append text content
                cardHeader1.textContent = "Upload File Page.";
                hidebtn.innerHTML = "&times;";
                upload_img_btn.textContent = "Upload";
                back_btn.textContent = "Back";

                // append element
                cardHeader1.appendChild(hidebtn);
                cardBody1.appendChild(img_tag);
                upload_form.appendChild(inp_hidn_csrf);                
                upload_form.appendChild(img_input_file);                
                upload_form.appendChild(upload_img_btn);                
                upload_form.appendChild(back_btn);
                cardBody1.appendChild(upload_form);
                mainCard.appendChild(cardHeader1);
                mainCard.appendChild(cardBody1);
                imgprocessing.appendChild(mainCard);
                
                // function for upload image.
                // hide form using class.
                for(let i = 0; i<document.getElementsByClassName('hide_form').length; i++){
                    document.getElementsByClassName('hide_form')[i].onclick = function(e){
                        e.preventDefault();
                        imgprocessing.innerHTML = "";
                        imgprocessing.className = "";
                    }
                }

                document.getElementById("img_file").onclick = function(e){
                    e.preventDefault();
                    document.getElementById("select_img_file").click();
                }

                document.getElementById("upload_img").onchange = function(e){
                    e.preventDefault();
                    let form1 = document.getElementById("upload_img");
                    let ajaximage = document.getElementsByClassName("imgupd");
                    let req = new XMLHttpRequest();
                    
                    req.open("post", "{{ url('upload') }}", true);
                    req.send(new FormData(form1));

                    req.onreadystatechange = function(){
                        if(req.readyState == 4 && req.status == 200){
                            let res = JSON.parse(req.responseText);

                            for(let img1 = 0; img1 < ajaximage.length; img1++){
                                ajaximage[img1].src = res.result[0]['emp_Image'];
                            }
                            // imgprocessing.innerHTML = "";
                            // imgprocessing.className = "";
                        }
                    }                    
                }
            }

            //    View profile image in database.
            document.getElementById('viewImage').onclick = function(){
                console.log("this");

                // get element by id.
                let imgprocessing = document.getElementById('imageprocessing');
                let imgulblock = document.getElementById('linkdiv');

                // create element.
                let mainCard = document.createElement('div');
                let cardHeader1 = document.createElement("div");
                let cardBody1 = document.createElement("div");
                let hidebtn = document.createElement("button");
                let back_btn = document.createElement("button");
                let img_tag = document.createElement("img");
                
                // empty parent element.
                imgprocessing.innerHTML = "";

                // add class in element.
                imgprocessing.className = "cover div_center";
                mainCard.className = "card div_center";
                cardHeader1.className = "card-header h1_made";
                cardBody1.className = "card-body text-center jumbotron";
                hidebtn.className = "hide_btn hide_form";
                back_btn.className = "btn float-left btnSize btnback hide_form";
                img_tag.className = "div_center img-thumbnail imgupd imgSize";

                // add src and file.
                img_tag.src = "{{ URL::to('/') }}/{{ session()->get('emp_image') }}";

                // add id in element.
                img_tag.id = "imgupd1";

                // add style in element.
                mainCard.style.width = "45%";
                mainCard.style.height = "60%";

                // remove class.
                imgulblock.classList.remove("show");

                // append text content
                cardHeader1.textContent = "View Image.";
                hidebtn.innerHTML = "&times;";
                back_btn.textContent = "Back";

                // append element
                cardHeader1.appendChild(hidebtn);
                cardBody1.appendChild(img_tag);               
                cardBody1.appendChild(back_btn);
                mainCard.appendChild(cardHeader1);
                mainCard.appendChild(cardBody1);
                imgprocessing.appendChild(mainCard);
                
                // function for upload image.
                // hide form using class.
                for(let i = 0; i<document.getElementsByClassName('hide_form').length; i++){
                    document.getElementsByClassName('hide_form')[i].onclick = function(e){
                        e.preventDefault();
                        imgprocessing.innerHTML = "";
                        imgprocessing.className = "";
                    }
                }
            }

            //    Remove profile image in database.
            document.getElementById('removeImage').onclick = function(){
                console.log("this");

                // get element by id.
                let imgprocessing = document.getElementById('imageprocessing');
                let imgulblock = document.getElementById('linkdiv');

                // create element.
                let mainCard = document.createElement('div');
                let cardHeader1 = document.createElement("div");
                let cardBody1 = document.createElement("div");
                let hidebtn = document.createElement("button");
                let upload_img_btn = document.createElement("button");
                let back_btn = document.createElement("button");

                // empty parent element.
                imgprocessing.innerHTML = "";

                // add class in element.
                imgprocessing.className = "cover div_center";
                mainCard.className = "card div_center";
                cardHeader1.className = "card-header h1_made";
                cardBody1.className = "card-body text-center";
                hidebtn.className = "hide_btn hide_form";
                back_btn.className = "btn btnSize btnback hide_form";
                upload_img_btn.className = "btn btnSize btnimgupld";
                upload_img_btn.id = "rmvImage";

                // add style in element.
                mainCard.style.width = "45%";
                mainCard.style.height = "40%";

                // remove class.
                imgulblock.classList.remove("show");

                // append text content
                cardHeader1.textContent = "Remove Image.";
                hidebtn.innerHTML = "&times;";
                cardBody1.innerHTML = "Are you sure to remove the image? <br/><br/>";
                upload_img_btn.textContent = "Yes";
                back_btn.textContent = "No";

                // append element
                cardHeader1.appendChild(hidebtn);                
                cardBody1.appendChild(upload_img_btn);                
                cardBody1.appendChild(back_btn);
                mainCard.appendChild(cardHeader1);
                mainCard.appendChild(cardBody1);
                imgprocessing.appendChild(mainCard);
                
                // function for upload image.
                // hide form using class.
                for(let i = 0; i<document.getElementsByClassName('hide_form').length; i++){
                    document.getElementsByClassName('hide_form')[i].onclick = function(e){
                        e.preventDefault();
                        imgprocessing.innerHTML = "";
                        imgprocessing.className = "";
                    }
                }

                document.getElementById("rmvImage").onclick = function(e){
                    e.preventDefault();
                    console.log('this');
                    let ajaximage = document.getElementById("imgupd1").src;
                    console.log(ajaximage);
                    let req = new XMLHttpRequest();
                    
                    req.open("get", "{{ url('remove') }}", true);
                    req.send();

                    req.onreadystatechange = function(){
                        if(req.readyState == 4 && req.status == 200){
                            let res = JSON.parse(req.responseText);
                            cardBody1.innerHTML = res.success;
                        }
                    }                    
                }
            }

            
       </script>
        <script src="{{ url(asset('assest/fontawesome/js/all.js')) }}"></script>
        <script src="{{ url(asset('assest/bootstrap/js/bootstrap.bundle.js')) }}"></script>
        <script src="{{ url(asset('assest/bootstrap/js/jquery.dataTables.min.js')) }}"></script>
        <script src="{{ url(asset('assest/bootstrap/js/bootstrap.min.js')) }}"></script>
    </body>
</html>