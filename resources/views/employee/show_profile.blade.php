@extends('layout')
@section('header') <h3>Profile Details</h3> @endsection
@section('body')
    @if($response)
        <div class="row">
            <div class="col-sm-8 offset-sm-2 table1">
                <table class="table" id="tableBorder">
                    @foreach($response as $res)
                        <tr><th>Employee Name: </th><td>{{ $res->emp_name }}</td>
                        <tr><th>Email: </th><td>{{ $res->emp_email }}</td></tr>
                        <tr><th>Password: </th><td>{{ $res->emp_password }}</td></tr>
                        <tr><th>Contact: </th><td>{{ $res->emp_contact }}</td></tr>
                        <tr><th>Genter: </th><td>{{ $res->emp_gender }}</td></tr>
                        <tr><th>Date of Barth: </th><td>{{ $res->emp_dob }}</td></tr>
                        <tr><th>Roll: </th><td>{{ $res->emp_roll }}</td></tr>
                        <tr><th>Status: </th><td>{{ $res->emp_status }}</td></tr>
                        <tr><th>Address: </th><td>{{ $res->emp_city }}, {{ $res->emp_district }}, 
                        {{ $res->emp_region }}, {{ $res->emp_state }} - {{ $res->emp_pincode }}, {{ $res->emp_contry }}
                        </td></tr>
                    @endforeach
                </table>  
            </div>
            <div class="col-sm-2">
                <img src="{{ url('assest/images', $res->emp_image) }}" class="img-thumbnail" height="150px" width="150px">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
            <img src="{{ url('assest/images', $res->emp_signature) }}" class="img-thumbnail float-right" height="150px" width="150px">
            </div>
        </div>
    @endif
@endsection