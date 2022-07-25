<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client as GuzzleClient;

// if we use this query DB::table("Table_Name")->get(); so use this use Illuminate\Support\Facades\DB; library is compulsory.
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Branch;

class Branchdetail extends Controller
{
    // Load the View of add branch for fill the data.
    public function pageShow(Request $request){
        if(!$request->session()->get('logged_in')){
            return redirect()->to('');
        }
    
        return view('branch/add_branch');
    }

    // Insrt the data in database.
    public function insertDetails(Request $request){
        if(!$request->session()->get('logged_in')){
            return redirect()->to('');
        }
        // Validate Form of Html
        $validation = request()->validate([
            'company_name' => 'required',
            'branch_name' => 'required|max:15',
            'owner_name' => 'required',
            'contact_no' => 'required',
            'pincode' => 'required|numeric',
            'city_name' => 'required',
            'district_name' => 'required',
            'region_name' => 'required',
            'state_name' => 'required',
            'contry_name' => 'required',
        ]);

        // Create a object of our Created Model. (our created model is Branch)
        $brnc = new Branch;

        // access data from html page and save the database. 
        $brnc->company_name = $request->input('company_name');
        $brnc->branchname = $request->input('branch_name');
        $brnc->ownername = $request->input('owner_name');
        $brnc->contact_no = $request->input('contact_no');
        $brnc->city_name = $request->input('city_name');
        $brnc->district_name = $request->input('district_name');
        $brnc->region_name = $request->input('region_name');
        $brnc->state_name = $request->input('state_name');
        $brnc->contry_name = $request->input('contry_name');
        $brnc->pincode = $request->input('pincode');

        // get data save in database
        $brnc->save();

        // Success Message print on the Html page.
        return redirect('add_branch')->with('info', 'A New Branch Add in Your Chain.');
        /* with() is the function that is pass the data on html page. 'info' is the key that is hold the message
        and we are use this key for display the message.*/

    }

    // Select Branch Details for User Knowledge.
    public function getBranchDetails(Request $request){
        // if(!$request->session()->get('logged_in')){
        //     return redirect()->to('');
        // }
        // data retrieve from database.
        $brnc = DB::table('branches')->get();
        // count the table row which is retrieve from query.
        $noOfRow = count($brnc);
        
        /* This line calculate the row and column. How many row display in html page and how many column display at 
        one row. */
        $divideRow = $noOfRow / 3;
        $calculatedRow = $noOfRow % 3;        

        /* This ($row) variable assign the row if $noOfRow % 3 == 0 that's mean is row's number is sum/even or if the 
        $noOfRow % 3 == 1 that's mean is row's number is Odd/nagative. it means result is 0 so we will send the even row
        and $noOfRow assign to 0. जब हम $noOfRow को 0 से assign करेंगे तो हमारे द्वारा Print कराऐ जा रहे Column में Blank Column 
        Add नही होंगे। */
        $row = 0;
        if($calculatedRow == 0){
            $row = $divideRow;
            $noOfRow = 0;
        }else{
            /*जब यह Condition True होती है तो इसका मतलब हमारी Table से जो Row की संख्‍या आ रही है उसमें भाग देने के बाद जो Result 
            Ganerate होता है वो दशमलव में हेाता है और इससे हमारे द्वारा Print करवाई जा रही Column की संख्‍या कम होगी इस लिए आने वाले 
            Result में हम एक जोड़ देते हैं। जिससे हमारी Row के अन्‍दर सभी Data Column के रूप में Print हो जाता है। */
            $row = $divideRow + 1;
            $row = (int)$row;
        }
        return view('branch/a_showbranch')->with(['branch'=>$brnc, 'row1' => $row, 'dbtable_row'=>$noOfRow]);
    }

    // Get the details for edit from Database.
    public function updatebranch(Request $request){
        if(!$request->session()->get('logged_in')){
            return redirect()->to('');
        }
        $cn = $request->input("name");
        if(!empty($cn)){
            $data = json_decode($cn);
            $company_name = $data->cn;
            if(!empty($company_name)){
                // this query get the data from database.
                $result = Branch::where('company_name','LIKE','%'.$company_name.'%')->get();
                return  response()->json([
                    'data' => $result
                ]);
            }
        }        
        return view('branch/updatebranchdetails');
    } 

    // Update the Branch Details
    public function saveUpdateBranchDetail(Request $request){
        if(!$request->session()->get('logged_in')){
            return redirect()->to('');
        }

        // access data from html page and save into the database. 
        $hideBrnc_id = $request->input('branch_id');

        // create array for store update darta. 
        $brnc = array();

        // array name is $brnc and in this bracket is table fields.
        $brnc['company_name'] = $request->input('company_name');
        $brnc['branchname'] = $request->input('branch_name');
        $brnc['ownername'] = $request->input('owner_name');
        $brnc['contact_no'] = $request->input('contact_no');
        $brnc['city_name'] = $request->input('city_name');
        $brnc['district_name'] = $request->input('district_name');
        $brnc['region_name'] = $request->input('region_name');
        $brnc['state_name'] = $request->input('state_name');
        $brnc['contry_name'] = $request->input('contry_name');
        $brnc['pincode'] = $request->input('pincode');

        // Update the date from help of Hidden Id which is send from HTML.
        $updateResult = DB::table("branches")->where('id', $hideBrnc_id)
                                            ->update($brnc);
        if($updateResult == 1){
            // echo "<pre>";
            // print_r($updateResult);
            // echo "</pre>";
            // exit;
            // Success Message print on the Html page.
            return redirect('update')->with('information', 'Your Branch Detail Updated Successfully.');
        }

        return view('branch/updatebranchdetails');
    }

    // Get the Address from POST office API.
    public function addressFromAPI(Request $request){
        // if(!$request->session()->get('logged_in')){
        //     return redirect()->to('');
        // }
        
        // create a object from guzzlehttp class client();
        $client = new \GuzzleHttp\Client();

        // get the data from html page.
        $pincode = $request->input('pincode');
        // echo "<pre>";
        // echo $pincode;
        // echo"</pre>";
        // exit();
        // if pincode has data this condition is true.
        if(!empty($pincode)){
            // it is postal api.
            $result = "http://postalpincode.in/api/pincode/" . $pincode;

            // send the request using client object and decode the result using json_decode.
            // $client this is object, get this is get the result from api, getbody is a function which is fire the query.
            $getAddress = json_decode($client->get($result)->getBody());
            
            // return response on html page. 
            return response()->json([
                'response' => $getAddress
            ]);
        }
    }
}
