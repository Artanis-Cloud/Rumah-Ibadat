<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();                                                                   //default

            $table->bigInteger('rumah_ibadat_id')->unsigned()->nullable();                  //rumah ibadat id
            $table->foreign('rumah_ibadat_id')->references('id')->on('rumah_ibadats');      //rumah ibadat id

            $table->bigInteger('user_id')->unsigned()->nullable();                          //user id
            $table->foreign('user_id')->references('id')->on('users');                      //user id

            //remarks permohonan
            $table->string('status')->default('1');                                         //(0-Tidak Lulus)(1-Sedang Diproses)(2-Lulus)
            $table->string('batch')->nullable();                                            //1 Batch can have 10 permohonan & batch start after...

            //before permohonan
            $table->string('application_letter');                                           //attachment
            $table->string('support_letter');                                               //attachment
            $table->string('account_statement');                                            //attachment
            $table->string('spending_statement');                                           //attachment
            $table->string('payment_method')->default('1');                                //(1-Check)(2-EFT)


            //after 



            $table->timestamps();                                                           //default
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonans');
    }
}
