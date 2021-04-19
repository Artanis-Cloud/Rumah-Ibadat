<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLampiransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lampirans', function (Blueprint $table) {
            $table->id();                                                       //default

            $table->bigInteger('tujuan_id')->unsigned()->nullable();            //user id
            $table->foreign('tujuan_id')->references('id')->on('tujuans');      //user id

            $table->string('data_type');                                        //(1-Image)(2-PDF)
            $table->string('url');                                              //attachment
            $table->string('description');

            $table->timestamps();                                               //default
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lampirans');
    }
}
