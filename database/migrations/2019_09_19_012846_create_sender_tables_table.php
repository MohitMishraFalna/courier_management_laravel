<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSenderTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sender_tables', function (Blueprint $table) {
            $table->Increments('sender_id')->primary;
            $table->string("sender_name", 50)->default("");
            $table->string("sender_email", 100)->unique;
            $table->string("sender_contact", 12)->default("");
            $table->string("pincode", 8)->default("");
            $table->string("city", 50)->default("");
            $table->string("district", 50)->default("");
            $table->string("region", 50)->default("");
            $table->string("state", 50)->default("");
            $table->string("contry", 50)->default("");
            $table->decimal("total_due", 10,2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sender_tables');
    }
}
