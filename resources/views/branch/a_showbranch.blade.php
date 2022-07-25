@extends('master')
@section('body')
    <h3 class="card-header mt-2 mb-2" style="background-color: #FFFFFF; color:#073642">Our Connected Brance Details.</h3>
    {{-- This is the comment box now if we want to write comment in blade so we can use this--}}

    {{-- This is the varible it holds the index value of the array which is getting from the server/controller.
        यह एक variable है जो Database से आने वाले Record के array की Index Value को Hold करके रखता है। और जैसे जैसे Loop 
        चलता है वैसे वैसे Index की Value बढती रहती है। --}}
    @php ($position=0)

    {{-- यह Count Variable है जो जैसे जैसे Loop चलेगा वैसे वैसे इसकी Value मेंं वृद्धि हेाती है और जब इसकी Value Controller से आने
        वाले Table के Row की संख्‍या के बराबर हो जाती है यह Loop को Break कर देता है जिससे Blank Column/ Card Print नहीं होती।--}}
    @php ($count = 1)

    {{-- This Loop Create Row.--}}
    @for($table_row=1; $table_row<=$row1; $table_row++)
        <div class="row mt-2">
            {{-- This Loop Create Column.--}}
            @for($table_col=1; $table_col<=3; $table_col++)
            <div class="col-sm-4">
                <div class="card branchCard">
                    <img src="{{ url('assest/bootstrap/img/table.jpg') }}" class="cardImage" width="100%" height="100%">
                    <div>
                        <table class="table">
                            {{-- This Loop Fetch Data.--}}
                            @while($position < count($branch))
                                <h3 class="text-center mt-2 bgColor">{{ $brn_name = $branch[$position]->branchname }} Branch</h3>
                                <tr><th>Comp. Name:</th><td>{{ $branch[$position]->company_name }}</td></tr>                        
                                <tr><th>Owener Name:</th><td>{{ $branch[$position]->ownername }}</td>    </tr>                    
                                <tr><th>Contact No.:</th><td>{{ $branch[$position]->contact_no }}</td>   </tr>                     
                                <tr><th>City Name:</th><td>{{ $branch[$position]->city_name }}</td>      </tr>                  
                                <tr><th>District Name:</th><td>{{ $branch[$position]->district_name }}</td></tr>                            
                                <tr><th>State Name:</th><td>{{ $branch[$position]->state_name }}</td>    </tr>                        
                                <tr><th>Contry Name: </th><td>{{ $branch[$position]->contry_name }}</td> </tr>                           
                                <tr><th>Pincode</th><td>{{ $branch[$position]->pincode }}</td>           </tr>                 
                                @php ($position++)
                                @break
                            @endwhile
                            {{--जब Count की Value Table Row के बराबर हो जाएगी तब यह Loop को Break कर देता है। --}}
                            @if($count == $dbtable_row)
                                @break
                            @endif
                            @php ($count++)
                        </table>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    @endfor
@endsection