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

            $table->id();                                                   //default

            $table->bigInteger('user_id')->unsigned()->nullable();          //user id
            $table->foreign('user_id')->references('id')->on('users');      //user id

            $table->string('verified')->default('0');                       //(1 = Verified Rumah Ibadat) (0 = Not Verified Rumah Ibadat)

            $table->string('category');                                     //(Gereja (Kristian))(Tokong (Budha & Tao))(Kuil (Hindu & Gurdwara))
            $table->string('name')->unique();
            $table->string('address');
            $table->string('postcode');
            $table->string('district');
            $table->string('state')->default('Selangor');;                  //All rumah ibadat is in Selangor
            $table->string('bank_name');
            $table->string('bank_account')->unique();
            $table->string('office_phone');
            $table->string('ros_number')->unique();


            $table->timestamps();                                           //default
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
