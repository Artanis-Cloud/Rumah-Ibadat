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

            $table->string('reference_number');                                             //displayed id

            $table->bigInteger('rumah_ibadat_id')->unsigned()->nullable();                  //rumah ibadat id
            $table->foreign('rumah_ibadat_id')->references('id')->on('rumah_ibadats');      //rumah ibadat id

            $table->bigInteger('user_id')->unsigned()->nullable();                          //user id
            $table->foreign('user_id')->references('id')->on('users');                      //user id

            //remarks permohonan
            $table->string('status')->default('1');                                         //(0-Semak Semula)(1-Sedang Diproses)(2-Lulus)(3-Tidak Lulus)(4-Batal)
            $table->string('batch')->nullable();                                            //1 Batch can have 10 permohonan & batch start after...

            //before permohonan

            //general attachment
            $table->string('application_letter');                                           //attachment
            $table->string('registration_certificate');                                     //attachment
            $table->string('account_statement');                                            //attachment

            $table->string('spending_statement')->nullable();                               //attachment
            $table->string('support_letter')->nullable();                                   //attachment
            $table->string('committee_member')->nullable();                                 //attachment
            $table->string('certificate_or_letter_temple')->nullable();                     //attachment
            $table->string('invitation_letter')->nullable();                                //attachment

            //semak semula
            $table->string('review_to_applicant_id')->nullable();                             //to identify user who give this status "Semak Semula"                           
            $table->text('review_to_applicant')->nullable();

            //tidak-lulus
            $table->string('not_approved_id')->nullable();                                    //to identify user who give this status "Tidak Lullus"   

            //after exco
            $table->string('exco_id')->nullable();                                          //flag_exco
            $table->string('exco_date_time')->nullable();                                   //date-time
            $table->text('review_exco')->nullable();                              


            //after yb
            $table->string('yb_id')->nullable();                                          //flag_yb
            $table->string('yb_date_time')->nullable();                                   //date-time
            $table->text('review_yb')->nullable();                              
            $table->string('payment_method')->default('1');                                //(1-Check)(2-EFT)
            $table->string('total_fund')->default('0.00');                                 //total fund apporved

            //after upen
            $table->string('upen_id')->nullable();                                          //flag_upen
            $table->string('upen_date_time')->nullable();                                   //date-time

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
