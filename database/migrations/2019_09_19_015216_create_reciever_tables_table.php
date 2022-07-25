<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecieverTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reciever_tables', function (Blueprint $table) {
            $table->Increments('reciever_id')->primary;
            $table->string("reciever_name", 50)->default("");
            $table->string("reciever_email", 100)->unique;
            $table->string("reciever_contact", 12)->default("");
            $table->string("pincode")->default("");
            $table->string("city", 50)->default("");
            $table->string("district", 50)->default("");
            $table->string("region", 50)->default("");
            $table->string("state", 50)->default("");
            $table->string("contry", 50)->default("");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reciever_tables');
    }
}
