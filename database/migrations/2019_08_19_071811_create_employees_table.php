<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->Increments('emp_id');
            $table->string('emp_name', 50)->default("");
            $table->string('emp_email', 50)->unique;
            $table->string('emp_password', 50)->default("");
            $table->string('emp_contact',15)->default("");
            $table->string('emp_gender', 10)->default("");
            $table->string('emp_pincode',10)->default("");
            $table->string('emp_city', 50)->default("");
            $table->string('emp_district', 50)->default("");
            $table->string('emp_region', 50)->default("");
            $table->string('emp_state', 50)->default("");
            $table->string('emp_contry', 50)->default("");
            $table->string('emp_image',100)->default("");
            $table->string('emp_signature',100)->default("");
            $table->date('emp_dob')->default(DB::raw("current_timestamp"));
            $table->date('emp_doj')->default(DB::raw("current_timestamp"));
            $table->date('emp_dor')->default(DB::raw("current_timestamp"));
            $table->string('emp_roll', 50)->default("");
            $table->string('emp_status',10)->default("");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
