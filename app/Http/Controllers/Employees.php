<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// if we use this query DB::table("Table_Name")->get(); so use this use Illuminate\Support\Facades\DB; library is compulsory.
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class Employees extends Controller
{
    public function pageView(Request $request){
        if(!$request->session()->get('logged_in')){
            return redirect()->to('');
        }
        return view('employee/add_employee');
    }
    public function insertDetails(Request $request){
        if(!$request->session()->get('logged_in')){
            return redirect()->to('');
        }
        // validate the form.
        $validation = request()->validate([
            'empName'        => 'required',
            'empContact'     => 'required',
            'empEmail'       => 'required|email',
            'empPassword'    => 'required',
            'empPincode'     => 'required',
            'empCity'        => 'required',
            'empDistrict'    => 'required',
            'empRegion'      => 'required',
            'empState'       => 'required',
            'empContry'      => 'required',
            'empDOB'         => 'required',
            'empDOJ'         => 'required',
            'empImage'       => 'required|image|max:2048',
            'empSignature'   => 'required|image|max:2048',
        ]);

        // get the image name from html page.
        $employeeImage = $request->file('empImage');
        $signatureImage = $request->file('empSignature');

        // get the name of the image from this method. empImage and empSignature name is validation key which is define in validation.
        $empImageNewname = $request->empImage->getClientOriginalName();
        $signImageNewname = $request->empSignature->getClientOriginalName();

        // this command is save the image name in images folder which is standing in public folder.
        $employeeImage->move(public_path('assest/images'), $empImageNewname);
        $signatureImage->move(public_path('assest/images'), $signImageNewname);

        // create the path of image. this path is helpful for us when we retrieve the image and display.
        // $empImageNewname = "public/images/" . $empImageNewname;
        // $signImageNewname = "public/images/" . $signImageNewname;

        // Create object of Employee Model.
        $emp = new Employee;

        // save the image path in database table
        $emp->emp_image = $empImageNewname;
        $emp->emp_signature	 = $signImageNewname;

        $emp->emp_name = $request->input('empName');
        $emp->emp_contact = $request->input('empContact');
        $emp->emp_gender = $request->input('empGender');
        $emp->emp_email = $request->input('empEmail');
        $emp->emp_password = $request->input('empPassword');
        $emp->emp_roll = $request->input('empRoll');
        $emp->emp_pincode = $request->input('empPincode');
        $emp->emp_city = $request->input('empCity');
        $emp->emp_district = $request->input('empDistrict');
        $emp->emp_region = $request->input('empRegion');
        $emp->emp_state = $request->input('empState');
        $emp->emp_contry = $request->input('empContry');
        $emp->emp_dob = $request->input('empDOB');
        $emp->emp_doj = $request->input('empDOJ');
        $emp->emp_status	 = "Deactivate";

        // save in the deta base.
        $emp->save();

        return redirect('new_employee')->with("information", "A New Employee Add in your Staff.");
    }

    public function editDetails(Request $request){
        if(!$request->session()->get('logged_in')){
            return redirect()->to('');
        }
        $name = $request->input("empName");
        // Search employee for update his details
        if(!empty($name)){
            $success = json_decode($name);
            $data = $success->empName;

            $result = Employee::where("emp_name", "LIKE", "%".$data."%")->get();
             
            // echo "<pre>";
            // print_r($result);
            // echo "</pre>";
            // exit;

            return response()->json([
                "data" => $result
            ]);
        }
        return view('employee/update_employee');
    }

    public function updateDetails(Request $request){
        if(!$request->session()->get('logged_in')){
            return redirect()->to('');
        }
        // both method take the value from html page using name attribute.
        // $hide_image = $request->hide_image;
        $hide_id = $request->hide_id;
        // Upload Image.
        // if we wont to update the image in this case old image path get from html page as hidden value.
        $hide_image = $request->input("hide_image");
        // step -1: get file from html page. if we want to update image so get the image from html page using name tag.
        $empSignatureImage = $request->file("empSignature");

        // if we want update image it means this condition is true and validate the form and upload the image.
        if($empSignatureImage != ''){
            $request->validate([
                'empName'        => 'required',
                'empContact'     => 'required',
                'empEmail'       => 'required|email',
                'empPassword'    => 'required',
                'empPincode'     => 'required',
                'empCity'        => 'required',
                'empDistrict'    => 'required',
                'empRegion'      => 'required',
                'empState'       => 'required',
                'empContry'      => 'required',
                'empDOB'         => 'required',
                'empDOJ'         => 'required',
                'empSignature'   => 'required|image|max:2048',
            ]);
            // step -2: get the image name using validation key empSignature.
            $hide_image = $request->empSignature->getClientOriginalName();
            // step -3: save image name in images folder which is standing in public folder.
            $empSignatureImage->move(public_path('assest/images'), $hide_image);

            // step -4: create path for save in database table. this path help for retrieving image.
            // $hide_image = "public/images/" . $hide_image;
        }
        // if we want update image it means this condition is true and validate the form and upload the image.
        else{
            $validation = $request->validate([
                'empName'        => 'required',
                'empContact'     => 'required',
                'empEmail'       => 'required|email',
                'empPassword'    => 'required',
                'empPincode'     => 'required',
                'empCity'        => 'required',
                'empDistrict'    => 'required',
                'empRegion'      => 'required',
                'empState'       => 'required',
                'empContry'      => 'required',
                'empDOB'         => 'required',
                'empDOJ'         => 'required',
            ]);
        }

        // Save the record in database table.
        // step -5: image path update in database.
        $record = array(
            'emp_name'          =>      $request->empName,
            'emp_email'         =>      $request->empEmail,
            'emp_password'      =>      $request->empPassword,
            'emp_contact'       =>      $request->empContact,
            'emp_gender'        =>      $request->empGender,
            'emp_pincode'       =>      $request->empPincode,
            'emp_city'          =>      $request->empCity,
            'emp_district'      =>      $request->empDistrict,
            'emp_region'        =>      $request->empRegion,
            'emp_state'         =>      $request->empState,
            'emp_contry'        =>      $request->empContry,
            'emp_signature'     =>      $hide_image,
            'emp_dob'           =>      $request->empDOB,
            'emp_doj'           =>      $request->empDOJ,
            'emp_roll'          =>      $request->empRoll
        );
       
        // create object of Employees model and define the update query and send argument.
        Employee::where('emp_id', $hide_id)
                ->update($record);
        return redirect('edit_employee')->with('success', 'Data is Successfully Updated.');
    }

    public function showpage(Request $request){
        if(!$request->session()->get('logged_in')){
            return redirect()->to('');
        }
        return view('employee/show_details');
    }
    public function getDetails(Request $request){
        if(!$request->session()->get('logged_in')){
            return redirect()->to('');
        }
        // $result = Employee::all();
        // select data from database table only which is your requirement.
        $result = DB::table("employees")->select('emp_name', 'emp_contact', 'emp_city', 'emp_image', 'emp_roll')->get();
        
        // convert in json formate and return on javascript onreadystatechange method.
        return  response()->json([
           'data' => $result
        ]);
        
        return view('employee/show_details');
    }

    public function profileDetails(Request $request){
        if(!$request->session()->get("logged_in")){
            return redirect()->to('');
        }

        $emp_id = $request->session()->get("emp_id");
        // dd($emp_id);
        $result = Employee::all()->where("emp_id",$emp_id);
        return view('employee/show_profile')->with("response", $result);
    }

    public function passwordchange(Request $request){
        if(!$request->session()->get("logged_in")){
            return redirect()->to('');
        }
        return view('employee/changepassword');
    }
    public function passwordupdate(Request $request){
        if(!$request->session()->get("logged_in")){
            return redirect()->to('');
        }
        $record = $request->input('data');

        if($record){
            $record = json_decode($record);

            $new_password = $record->newPassword;

            $emp_id = $request->session()->get("emp_id");

            // $emp_email = $record->emailAddress;
            // $emp_password = $record->oldPassword;

            $dataArray = array();
            $dataArray["emp_id"] = $emp_id;
            $dataArray["emp_email"] = $record->emailAddress;
            $dataArray["emp_password"] = $record->oldPassword;

            $result = DB::table('employees')->where($dataArray)->update(["emp_password" => $new_password]);
            return response()->json(['success' => "Your New Password Updated."]);

            /*this query also update the data.
            Employee::where('emp_id', $hide_id)
            ->update($record);
            second way 
            $result = DB::table('employees')->where("emp_id", $emp_id)->update(["emp_password" => $new_password]);                
            this query description is available in phpnoteandlaravel nots. */
        }
    }
}
