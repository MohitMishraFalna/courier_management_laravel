@extends('master')
@section('body')
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Qourier Statment Print</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <table class="table" id="tableBorder">
                        <tr><th width="25%">Sender Id No.</th><td>:</td><td>{{ $result[0]->sender_id }}</td></tr> 
                        <tr><th>Sender Name</th><td>:</td><td>{{ $result[0]->sender_name }}</td></tr> 
                        <tr><th>contact</th><td>:</td><td>{{ $result[0]->sender_contact }}</td></tr> 
                        <tr><th>Address</th><td>:</td><td>{{ $result[0]->city }}, {{ $result[0]->district }}, 
                        {{ $result[0]->region }}, {{ $result[0]->state }}, {{ $result[0]->contry }} - {{ $result[0]->pincode }}</td></tr> 
                        <tr><th>Total Due</th><td>:</td><td>{{ $result[0]->total_due }}</td></tr>
                    </table>
                </div>
                <div class="col-sm-6">
                <table class="table" id="tableBorder">
                        <tr><th width="30%">Reciever Id No.</th><td>:</td><td>{{ $result[0]->reciever_id }}</td></tr> 
                        <tr><th>Reciever Name</th><td>:</td><td>{{ $result[0]->reciever_name }}</td></tr> 
                        <tr><th>Contact</th><td>:</td><td>{{ $result[0]->reciever_contact }}</td></tr> 
                        <tr><th>Address</th><td>:</td><td>{{ $result[0]->city }}, {{ $result[0]->district }}, 
                        {{ $result[0]->region }}, {{ $result[0]->state }}, {{ $result[0]->contry }}- {{ $result[0]->pincode }}</td></tr> 
                        
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="item_title">Product Purticular</div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Qourier Name</th>
                                <th>Querier Type</th>
                                <th>Querier Subtype</th>
                                <th>Querier Weight</th>
                                <th>Querier Qty</th>
                                <th>Querier Price</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result as $res)
                                <tr>
                                    <td>{{ $res->qourier_name}}</td>
                                    <td>{{ $res->querier_type}}</td>
                                    <td>{{ $res->querier_subtype}}</td>
                                    <td>{{ $res->querier_weight}}</td>
                                    <td>{{ $res->querier_qty}}</td>
                                    <td>{{ $res->querier_price}}</td>
                                    <td>{{ $res->total_amt}}</td>
                                </tr>
                            @endforeach 
                        </tbody>
                        <tr>
                            <th>Paid Amount:</th><td>{{ $result[0]->amount_paid}}</td>
                            <th>Due Amount:</th><td>{{ $result[0]->amount_due}}</td>
                            <th>Grand Total:</th><td>{{ $result[0]->grand_total}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <label for="">Thanks For Choosing our service...</label>
            <button class="btn btn-info float-right d-print-none" id="print">Print</button>
        </div>
    </div>
@endsection
@section('js')
<script>
        document.getElementById("print").onclick = function(){
            window.print();
        }
</script>
@endsection