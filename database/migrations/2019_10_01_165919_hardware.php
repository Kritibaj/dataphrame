<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hardware extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('hardware', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hardware');
            $table->string('job_order_number');
            $table->string('quantity');            
            $table->string('delivery_status');
            $table->string('configuration_status');
            $table->string('shipped');
            $table->string('notes');
            $table->string('publish');
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
        Schema::dropIfExists('hardware');
    }
}
