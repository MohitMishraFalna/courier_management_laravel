<!DOCTYPE html>
<html lang="en">
    <head>
        @yield('head')
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ url(asset('assest/bootstrap/css/bootstrap.min.css')) }}">
        <link rel="stylesheet" href="{{ url(asset('css/style.css')) }}">
    </head>
    <body id="centerbody">
        <!-- <i class="fa fa-home"></i> this is for favicon -->
        <div class="leftSideBar">
            <h3 class="text-center mt-3 fntclr">Roll</h3>
            <div class="d-flex justify-content-center">
                <div class="img1 imginnercover">
                    <!-- <img src="{{ url('public/static/bootstrap/img/profile1.jpg') }}"> -->
                    <img id="ajaximage" src="{{ URL::to('/') }}/{{ session()->get('emp_image') }}">
                    <div class="uploadsign">
                    <a class="btn btn-info" data-toggle="collapse" data-target="#linkdiv"><i class="fa fa-camera cmrastyle"></i></a>
                    <p>Upload Image</p>
                    </div>
                    
                </div> 
                <div id="linkdiv" class="collapse">
                    <ul id="imgpgslink" >
                        <!-- <li><a href="{{ url('Imageupload') }}">Upload Image</a></li> -->
                        <li><a class="removelinkproperty" id="uploadImage">
                            <form id="upload_Form" enctype="multipart/form-data" method="post">
                                @csrf
                                <input type="file" name="uploadfile" id="selctfile" style="display:none">
                                <input type="button" value="Upload Image" onclick="document.getElementById('selctfile').click();">
                            </form>
                        </a></li>
                        <li><a class="removelinkproperty" href="{{ url('Imageview') }}">View Image</a></li>
                        <li><a class="removelinkproperty" href="{{ url('Imageremove') }}">Remove Image</a></li>
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
                            </ul>
                        @endif
                    </li>
                    <li><a href="">Customer</a>
                        <ul>
                            <li><a href="">Courier Sender</a></li>
                            <li><a href="">Courier Reciever</a></li>
                        </ul>
                    </li>
                    <li><a href="">Courier</a>
                        @if(session()->get('emp_roll') == "Owner" || session()->get('emp_roll') == "Office Boy")
                            <ul>
                                <li><a href="">Add Courier</a></li>
                                <li><a href="" >Update Courier</a></li>
                                <li><a href="">Courier Detail</a></li>
                                <li><a href="">Courier Dispacth</a></li>
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
          document.getElementById("upload_Form").onchange = function(e){
            e.preventDefault();
            let form1 = document.getElementById("upload_Form");
            let ajaximage = document.getElementById("ajaximage");
            console.log(form1);
            let req = new XMLHttpRequest();
            
            req.open("post", "{{ url('upload') }}", true);
            req.send(new FormData(form1));

            req.onreadystatechange = function(){
                if(req.readyState == 4 && req.status == 200){
                    let res = JSON.parse(req.responseText);
                    ajaximage.src = res.result[0]['emp_image'];
                }
            }
            
          }
       </script>
        <script src="{{ url(asset('assest/fontawesome/js/all.js')) }}"></script>
        <script src="{{ url(asset('assest/bootstrap/js/jquery.js')) }}"></script>
        <script src="{{ url(asset('assest/bootstrap/js/bootstrap.bundle.js')) }}"></script>
        <script src="{{ url(asset('assest/bootstrap/js/bootstrap.min.js')) }}"></script>
    </body>
</html>