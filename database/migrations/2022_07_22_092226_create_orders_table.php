<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->unsignedInteger("sender_id");
            $table->foreign("sender_id")->references('sender_id')->on("sender_tables");
            $table->unsignedInteger("reciever_id");
            $table->foreign("reciever_id")->references('reciever_id')->on("reciever_tables");
            $table->decimal("amount_paid", 10,2)->default(0);
            $table->decimal("amount_due", 10,2)->default(0);
            $table->decimal("grand_total", 10,2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
