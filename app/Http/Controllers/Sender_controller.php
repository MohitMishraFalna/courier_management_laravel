<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sender_table;

class Sender_controller extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view("querier_order/sender_edit");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        $validation = request()->validate([
            'sender_name'    => 'required',
            'sender_email'   => 'required|email',
            'sender_contact' => 'required',
            'pincode'        => 'required',
            'city_name'      => 'required',
            'dist_name'      => 'required',
            'region_name'    => 'required',
            'state_name'     => 'required',
            'cont_name'      => 'required',
        ]);

        $sender = new Sender_table;
        $sender->sender_name = $request->input('sender_name');
        $sender->sender_email = $request->input('sender_email');
        $sender->sender_contact = $request->input('sender_contact');
        $sender->pincode = $request->input('pincode');
        $sender->city = $request->input('city_name');
        $sender->district = $request->input('dist_name');
        $sender->region = $request->input('region_name');
        $sender->state = $request->input('state_name');
        $sender->contry = $request->input('cont_name');

        $sender->save();

        return redirect("order")->with("info", "A Sender Add in your Staff.");
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
            $data = $success->senderName;
            $result = Sender_table::where("sender_name", "LIKE", "%".$data."%")->get();
             
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
            'sender_name'    => 'required',
            'sender_email'   => 'required|email',
            'sender_contact' => 'required',
            'pincode'        => 'required',
            'city_name'      => 'required',
            'dist_name'      => 'required',
            'region_name'    => 'required',
            'state_name'     => 'required',
            'cont_name'      => 'required',
        ]);

        $id = $request->input("hide_id");
        echo($id);
        
        $sender= array();
        $sender['sender_name'] = $request->input('sender_name');
        $sender['sender_email'] = $request->input('sender_email');
        $sender['sender_contact'] = $request->input('sender_contact');
        $sender['pincode'] = $request->input('pincode');
        $sender['city'] = $request->input('city_name');
        $sender['district'] = $request->input('dist_name');
        $sender['region'] = $request->input('region_name');
        $sender['state'] = $request->input('state_name');
        $sender['contry'] = $request->input('cont_name');

        // echo "<pre>";
        // print_r($sender);
        // die();

        $sender_table = Sender_table::where("sender_id",$id)->update($sender);
        return redirect("sender_show")->with("information", "Sender details updated.");
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
