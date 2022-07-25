<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Querier_table;
use App\Models\Sender_table;
use App\Models\Reciever_table;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class QuerierTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("querier_order/querier_order");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            //code...
            $data = $request->input("data");
            // encode data to decode for laravel understanding
            $data = json_decode($data);

            // if receiver id not come.
            // if($reciever_id == 0){
            //     $reciever = Reciever_table::orderBy('reciever_id', 'desc')->take(1)->first();
            //     $reciever_id = $reciever->reciever_id;
            // }
            
            
            // update sender with the new due amount
            $sender = Sender_table::where('sender_id', $data->sender_id)->get();
            $new_due = $sender[0]->total_due + $data->due_amt;
            Sender_table::where('sender_id', $data->sender_id)->update(['total_due'=> $new_due]);
            
            // insert in order table
            $order = new Order;
            $order->sender_id     = $data->sender_id;
            $order->reciever_id   = $data->reciever_id;
            $order->amount_paid   = $data->paid_amt;
            $order->amount_due    = $data->due_amt;
            $order->grand_total   = $data->grand_total;
            $order->save();
            if($order->order_id){
                
                $qourier = array();

                for($i = 0; $i < count($data->prod_name); $i++){
                    // echo $prod_name[$i];
                    $qourier[$i]['order_id']            = $order->order_id; 
                    $qourier[$i]['qourier_name']        = $data->prod_name[$i]; 
                    $qourier[$i]['querier_type']        = $data->prod_type[$i];
                    $qourier[$i]['querier_subtype']     = $data->prod_subtype[$i];
                    $qourier[$i]['querier_weight']      = $data->prod_weight[$i];
                    $qourier[$i]['querier_qty']         = $data->prod_qty[$i];
                    $qourier[$i]['querier_price']       = $data->prod_price[$i];
                    $qourier[$i]['total_amt']           = $data->total_amt[$i];
                }
                // this query enter bulk of amount data insert in one time
                Querier_table::insert($qourier);
            }
            
        } catch (\Throwable $th) {
            throw $th;
            return response()->json([
                'exception'=>$th
            ]);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /*get the id.*/
        // $sender = Sender_table::where("sender_email", $sender_email)->get();
        // $sender_id = $sender[0]->sender_id;

        // $reciever_id = Reciever_table::orderBy('reciever_id', 'desc')->take(1)->first();
        // $trans->id;
        // $id = DB::table('users')->insertGetId(
        //     [ 'name' => 'first' ]
        //     );
        // print_r($_GET);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Querier_table  $querier_table
     * @return \Illuminate\Http\Response
     */
    public function show($id=null){
        $order_id = 0;
        if(!$id){
            $order = Order::orderBy('order_id', 'desc')->take(1)->first();
            $order_id = $order->order_id;
        }else{
            $order_id = $id;
        }

        $result = DB::table("orders as od")
                        ->where("od.order_id",$order_id)
                        ->join('sender_tables', "od.sender_id", "=", "sender_tables.sender_id")
                        ->join('reciever_tables', "od.reciever_id", "=", "reciever_tables.reciever_id")
                        ->join('querier_tables', "od.order_id", "=", "querier_tables.order_id")
                ->select("*")
                ->get();
        // dd($result);

        // print_r($result[0]->sender_name);
        return view('querier_order/orderprint')->with(['result'=> $result]); 
    }

    public function order_list()
    {
        # code...
        $result = DB::table('orders as ord')
                        ->join('sender_tables', 'ord.sender_id', '=', 'sender_tables.sender_id')
                        ->join('reciever_tables', 'ord.reciever_id', '=', 'reciever_tables.reciever_id')
                        ->select('*')
                        ->get();
        // dd($result);
        return view('querier_order/all_order', ['result'=> $result]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Querier_table  $querier_table
     * @return \Illuminate\Http\Response
     */
    public function edit(Querier_table $querier_table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Querier_table  $querier_table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Querier_table $querier_table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Querier_table  $querier_table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Querier_table $querier_table)
    {
        //
    }
}
