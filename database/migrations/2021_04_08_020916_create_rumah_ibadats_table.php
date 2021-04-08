<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRumahIbadatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rumah_ibadats', function (Blueprint $table) {

            $table->id();                                       //default

            $table->string('category');                         //(Cina)(India)(Kristian)

            $table->string('name')->unique();
            $table->string('address');
            $table->string('postcode');
            $table->string('district');
            $table->string('state');
            $table->string('bank_name');
            $table->string('bank_account')->unique();
            $table->string('office_phone');
            $table->string('ros_number')->unique();

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();                               //default
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rumah_ibadats');
    }
}