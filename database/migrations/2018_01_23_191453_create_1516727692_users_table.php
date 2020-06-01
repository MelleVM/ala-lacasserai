<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1516727692UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('address');
                $table->string('residence');
                $table->string('postal_code');
                $table->string('email');
                $table->string('password');
                $table->integer('role_id')->default(1);
                $table->datetime('checked_in_to')->nullable();
                $table->integer('checked_in_room')->nullable();
                $table->datetime('checked_out_time')->nullable();
                $table->integer('checked_out_room')->nullable();
                $table->string('remember_token')->nullable();
                
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
        Schema::dropIfExists('users');
    }
}
