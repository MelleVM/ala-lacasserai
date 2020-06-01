<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1516728224BookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('bookings')) {
            Schema::create('bookings', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->datetime('time_from')->nullable();
                $table->datetime('time_to')->nullable();
                $table->integer('nights')->nullable();
                $table->text('additional_information')->nullable();
                $table->boolean('payed')->default(false);
                $table->string('payment_method')->nullable();
                $table->double('price');
                $table->string('state')->default('pending');
                $table->string('room_number')->nullable();
                
                $table->timestamps();

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
