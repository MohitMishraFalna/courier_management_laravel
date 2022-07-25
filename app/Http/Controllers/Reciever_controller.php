<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reciever_table;

class Reciever_controller extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view("querier_order/reciever_edit");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        $validation = request()->validate([
            'reciever_name'    => 'required',
            'reciever_email'   => 'required|email',
            'reciever_contact' => 'required',
            'pincode'        => 'required',
            'city_name'      => 'required',
            'dist_name'      => 'required',
            'region_name'    => 'required',
            'state_name'     => 'required',
            'cont_name'      => 'required',
        ]);

        $reciever = new Reciever_table;

        $reciever->reciever_name = $request->input('reciever_name');
        $reciever->reciever_email = $request->input('reciever_email');
        $reciever->reciever_contact = $request->input('reciever_contact');
        $reciever->pincode = $request->input('pincode');
        $reciever->city = $request->input('city_name');
        $reciever->district = $request->input('dist_name');
        $reciever->region = $request->input('region_name');
        $reciever->state = $request->input('state_name');
        $reciever->contry = $request->input('cont_name');
        
        $reciever->save();

        return redirect("order")->with("information", "A Reciever Add in your Staff.");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request){
        $name = $request->input("data");
        if(!empty($name)){
            $success = json_decode($name);
            $data = $success->recieverName;
            $result = Reciever_table::where("reciever_name", "LIKE", "%".$data."%")->get();
             
            // echo "<pre>";
            // print_r($result);
            // echo "</pre>";
            // exit;

            return response()->json([
                "data" => $result
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        $validation = request()->validate([
            'reciever_name'    => 'required',
            'reciever_email'   => 'required|email',
            'reciever_contact' => 'required',
            'pincode'        => 'required',
            'city_name'      => 'required',
            'dist_name'      => 'required',
            'region_name'    => 'required',
            'state_name'     => 'required',
            'cont_name'      => 'required',
        ]);
        
        $id = $request->input("hide_id");
        
        $reciever= array();
        $reciever['reciever_name'] = $request->input('reciever_name');
        $reciever['reciever_email'] = $request->input('reciever_email');
        $reciever['reciever_contact'] = $request->input('reciever_contact');
        $reciever['pincode'] = $request->input('pincode');
        $reciever['city'] = $request->input('city_name');
        $reciever['district'] = $request->input('dist_name');
        $reciever['region'] = $request->input('region_name');
        $reciever['state'] = $request->input('state_name');
        $reciever['contry'] = $request->input('cont_name');

        // echo "<pre>";
        // print_r($sender);
        // die();

        $reciever_table = Reciever_table::where("reciever_id",$id)->update($reciever);
        return redirect("reciever_show")->with("information", "Reciever details updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
    }
}
