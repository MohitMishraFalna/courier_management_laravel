<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Querier_table extends Model
{
    public $timestamps = false;
    protected $primaryKey = "querier_id";

    // public function Reciever_table(){
    //     return $this->belongsTo('App\Reciever_table');
    // }

    // public function Sender_table(){
    //     return $this->belongsToMany('App\Sender_table');
    //  }
}
