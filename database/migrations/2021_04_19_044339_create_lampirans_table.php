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

            $table->bigInteger('tujuan_id')->unsigned()->nullable();            //tujuan id
            $table->foreign('tujuan_id')->references('id')->on('tujuans');      //tujuan id

            $table->string('file_type');                                        //(pdf) (png) (jpg) (jpeg)
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
