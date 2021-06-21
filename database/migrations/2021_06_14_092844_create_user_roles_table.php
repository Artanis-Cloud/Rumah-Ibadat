<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();                                               //default

            $table->bigInteger('user_id')->unsigned()->nullable();      //tujuan id
            $table->foreign('user_id')->references('id')->on('users');  //tujuan id

            $table->string('tokong')->default(0);                       //CINA
            $table->string('kuil')->default(0);                       //HINDU                
            $table->string('gurdwara')->default(0);                       //GURDWARA                
            $table->string('gereja')->default(0);                       //KRISTIAN                

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
        Schema::dropIfExists('user_roles');
    }
}
