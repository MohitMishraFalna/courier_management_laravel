<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reciever_table extends Model
{
    public $timestamps = false;
    protected $primaryKey = "reciever_id";

    // public function Querier_table(){
    //     return $this->hasMany('App\Querier_table');
    // }
}
