<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuerierTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('querier_tables', function (Blueprint $table) {
            $table->Increments('querier_id')->primary;
            $table->unsignedInteger("order_id");
            $table->foreign("order_id")->references('order_id')->on("orders");
            $table->string("qourier_name", 80)->default("");
            $table->string("querier_type", 80)->default("");
            $table->string("querier_subtype", 80)->default("");
            $table->string("querier_weight", 80)->default("");
            $table->string("querier_qty", 6)->default("");
            $table->decimal("querier_price", 10,2)->default(0);
            $table->decimal("total_amt", 10,2)->default(0);            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('querier_tables');
    }
}
