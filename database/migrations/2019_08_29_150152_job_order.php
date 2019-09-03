<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JobOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('job_orders', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('job_order_number');
            $table->string('quote_number');
            $table->string('quote_value');
            $table->string('description');            
            $table->string('scope');
            $table->string('hotel_name');
            $table->string('address');
            $table->string('city');
            $table->string('post_code');
            $table->string('country');
            $table->string('hotel_contact');
            $table->string('dat_of_request');
            $table->string('po_number');
            $table->string('client_pm');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_orders');
    }
}
