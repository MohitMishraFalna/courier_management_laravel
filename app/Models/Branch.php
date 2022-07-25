<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //remove the created_at and updated_at fields from database's table
    public $timestamps = false;
}
