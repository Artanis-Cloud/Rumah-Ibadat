<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id(); //default

            $table->string('allow_permohonan')->default('1');   // enable and disable new permohonan
            $table->string('allowed_user_id')->nullable();      //user record for enabling or disabling the permohonan

            $table->string('main_batch')->default('1');         //main batch 

            $table->string('tokong_counter')->default('0');     //tokong counter - if more than 10 add 1 to batch_main
            $table->string('tokong')->default('0');             //tokong batch

            $table->string('kuil_counter')->default('0');       //kuil counter - if more than 10 add 1 to batch_main
            $table->string('kuil')->default('0');               //kuil batch

            $table->string('gurdwara_counter')->default('0');   //gurdwara counter - if more than 10 add 1 to batch_main
            $table->string('gurdwara')->default('0');           //gurdwara batch

            $table->string('gereja_counter')->default('0');     //gereja counter - if more than 10 add 1 to batch_main
            $table->string('gereja')->default('0');             //gereja batch

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
        Schema::dropIfExists('batches');
    }
}
