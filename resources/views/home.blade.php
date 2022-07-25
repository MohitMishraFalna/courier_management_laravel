@extends('master')
@section('body')
    <div class="div_center">
        <div class="d-flex justify-content-center">
            <img src="{{ url(asset('assest/bootstrap/img/loginbackground4.png')) }}" width="150px" height="150px">
        </div>
        <div class="card mt-2" style="width: 18rem;">
            <div class="card-body">
                @if(session("error"))
                    <div class="alert-danger">
                      {{ session('error') }}  
                    </div>
                @endif
                <form id="myForm" action="{{ url('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="empEmail" name="empEmail" aria-describedby="emailHelp" placeholder="Enter email">               
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="empPass" name="empPass" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
