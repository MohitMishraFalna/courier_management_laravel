@extends('layout')
@section('header') 
<h3>All Order Details</h3>
@endsection
@section('body')
<div class="card">
    <div class="card-body">
        <table id="orderList" class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>Order No</th>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th>Amount</th>
                    <th>Due</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $result as $res)
                <tr>
                    <td><b><a href="{{ url('printorder', $res->order_id) }}">{{ $res->order_id }}</a></b></td>
                    <td>{{ $res->sender_name }}</td>
                    <td>{{ $res->reciever_name }}</td>
                    <td>{{ $res->amount_paid }}</td>
                    <td>{{ $res->amount_due }}</td>
                    <td>{{ $res->grand_total }}</td>
                </tr>
                @endforeach
            </tbody>           
        </table>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#orderList').DataTable();
    });
</script>
@endsection