<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class home extends Controller
{
    public function home(){
        return view('home');
    }

    public function login(Request $request){
        // $record = $request->input("data");
        // $record = json_decode($record);
        
        // $emp_email = $record->empEmail;
        // $emp_password = $record->empPass;
        // echo $emp_email;

        $emp_email = $request->input('empEmail');
        $emp_password = $request->input('empPass');

        $result = DB::table("employees")->select("emp_id","emp_email","emp_image","emp_roll")
                                        ->where(["emp_email" => $emp_email, "emp_password" => $emp_password])->get()->toArray();
        if(!empty($result)){
            $request->session()->put([
                "emp_id" => $result[0]->emp_id,
                "emp_email" => $result[0]->emp_email,
                "emp_image" => $result[0]->emp_image,
                "emp_roll" => $result[0]->emp_roll,
                "logged_in" => TRUE,
            ]);            

            return redirect()->to('workbanch');
        }else{
            return redirect()->to('')->with("error", "User doen't exist.");
        }
    }

    public function logout(Request $request){
        if($request->session()->get("logged_in")){
            $request->session()->forget("logged_in");
        }
        return redirect()->to('');
    }
        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";
        // echo $result[0]->emp_id;
        // exit();
    
}
