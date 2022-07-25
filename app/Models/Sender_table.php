<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sender_table extends Model
{
   public $timestamps = false;
   protected $primaryKey = "sender_id";

   // public function Querier_table(){
   //    return $this->hasMany('App\Querier_table');
   // }
}
