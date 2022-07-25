<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class Imagecontroller extends Controller
{
    public function imageupload(Request $request){
        if(!$request->session()->get('logged_in')){
            return redirect()->to('');
        }

        $validation = request()->validate([
            'uploadfile'       => 'required|image|max:2048',
        ]);

        // get the id.
        $emp_id = $request->session()->get('emp_id');

        // upload image in data base 
        // step 1: get the image photo details from html page.
        $imgupld = $request->file('uploadfile');
            
        // step2: get the image name.
        $img_name = $request->uploadfile->getClientOriginalName();
        
        // step3: upload/save image in uploads/images folder.
        $imgupld->move(public_path('assest/images'), $img_name);
        
        // step4: create path for save in table.
        // $img_name = "public/images/" . $img_name;
       
       
        // step5: update the image in database table.
        // DB::table('employees')
        // ->where('emp_id', '=', $emp_id)
        // ->update([
        //     'emp_image' =>  $img_name
        // ]);
        Employee::where('emp_id', '=', $emp_id)
        ->update([
            'emp_Image' =>  $img_name
        ]);
        
        $result = Employee::where('emp_id', $emp_id)->get('emp_Image');

        return response()->json([
            'result' => $result
        ]);
    }
    
    public function imagedelete(Request $request){
       
        $emp_id = $request->session()->get('emp_id');
        
        Employee::where("emp_id", $emp_id)
        ->update([
            'emp_Image' =>  ""
        ]);
        
        return response()->json([
            'success' => "Image removed successfully."
        ]);
          
    }
}
