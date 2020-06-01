<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1516728105RoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('rooms')) {
            Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');

            $table->string('room_number');
            $table->boolean('clean')->default(true);
            $table->integer('floor');
            $table->text('description');
                
            $table->double('price', 10, 2)->default('0');
            $table->double('disc', 10, 2)->default('0');
            $table->string('state')->default('available');
            $table->string('type')->default('single');
            $table->string('title')->nullable();
            $table->integer('rating')->default('5');
            $table->string('cover_image')->default('noimage.png');

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
        Schema::dropIfExists('rooms');
    }
}
