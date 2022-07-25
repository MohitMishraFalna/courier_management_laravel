<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('company_name',50)->default("");
            $table->string('branchname',50)->unique;
            $table->string('ownername',50)->default("");
            $table->string('contact_no', 12)->default("");
            $table->integer('pincode')->default(0);
            $table->string('city_name',50)->default("");
            $table->string('district_name',50)->default("");
            $table->string('region_name',50)->default("");
            $table->string('state_name',50)->default("");
            $table->string('contry_name',50)->default("");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
