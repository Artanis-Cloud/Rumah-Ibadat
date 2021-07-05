<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_applications', function (Blueprint $table) {
            $table->id();                                                   //default

            $table->bigInteger('user_id')->unsigned()->nullable();          //user id
            $table->foreign('user_id')->references('id')->on('users');      //user id

            $table->string('reference_number');
            $table->string('status')->default('0');                         //(0-Tidak Lulus)(1-Sedang Diproses)(2-Lulus)
            $table->string('category');                                     //(Gereja)(Tokong)(Kuil)(Gurdwara)

            $table->text('purpose')->nullable();;
            $table->string('supported_document_1')->nullable();;            //attachment
            $table->string('supported_document_2')->nullable();;            //attachment
            $table->string('requested_amount')->default('0.00');            //money

            //tidak-lulus
            $table->string('not_approved_id')->nullable();                  //to identify user who give this status "Tidak Lullus"   

            $table->string('exco_id')->nullable();                          //flag_exco
            $table->string('exco_date_time')->nullable();                   //date-time

            $table->string('yb_id')->nullable();                            //flag_yb
            $table->string('yb_date_time')->nullable();                     //date-time



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
        Schema::dropIfExists('special_applications');
    }
}
