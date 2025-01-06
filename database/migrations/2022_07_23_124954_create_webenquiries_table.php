<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebenquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webenquiries', function (Blueprint $table) {
            $table->id();
            $table->string('custname')->nullable();
            $table->string('custmobile')->nullable();
            $table->string('address')->nullable();
            $table->string('pincode')->nullable();
            $table->string('checkindate')->nullable();
            $table->string('checkoutdate')->nullable();
            $table->string('no_of_persons')->nullable();
            $table->string('no_of_room')->nullable();
            $table->string('note',1000)->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('webenquiries');
    }
}
