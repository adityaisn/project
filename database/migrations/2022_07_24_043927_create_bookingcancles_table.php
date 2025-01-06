<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingcanclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookingcancles', function (Blueprint $table) {
            $table->id();
             $table->string('custname')->nullable();
            $table->string('custmobile')->nullable();
            $table->string('email')->nullable();
            $table->string('checkindate')->nullable();
            $table->string('checkoutdate')->nullable();
            $table->string('reason')->nullable();
            $table->string('other1')->nullable();
            $table->string('other2')->nullable();
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
        Schema::dropIfExists('bookingcancles');
    }
}
