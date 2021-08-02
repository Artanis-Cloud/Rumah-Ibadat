<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTukarRumahIbadatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tukar_rumah_ibadats', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned()->nullable();          //user id
            $table->foreign('user_id')->references('id')->on('users');      //user id

            $table->string('reference_number');
            $table->string('status')->default('1');                         //(0-Tidak Lulus)(1-Sedang Diproses)(2-Lulus)


            $table->string('category');                                     //(Gereja)(Tokong)(Kuil)(Gurdwara)
            $table->string('rumah_ibadat_id');                                     
            

            $table->text('comment')->nullable(); 
            $table->string('supported_document')->nullable();               //attachment



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
        Schema::dropIfExists('tukar_rumah_ibadats');
    }
}
