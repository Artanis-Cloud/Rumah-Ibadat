<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanKhassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan_khass', function (Blueprint $table) {
            $table->id();                                                   //default

            $table->bigInteger('user_id')->unsigned()->nullable();          //user id
            $table->foreign('user_id')->references('id')->on('users');      //user id

            $table->string('status');                                       //(0-Tidak Lulus)(1-Sedang Diproses)(2-Lulus)
            $table->string('category');                                     //(Gereja (Kristian))(Tokong (Budha & Tao))(Kuil (Hindu & Gurdwara))
            
            $table->string('purpose');                                      
            $table->string('supported_document_1');                         //attachment
            $table->string('supported_document_2');                         //attachment
            $table->string('requested_amount');                             //money

            $table->timestamps();//default
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonan_khass');
    }
}
