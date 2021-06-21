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

            $table->string('category');                                     //(Gereja (Kristian))(Tokong (Budha & Tao))(Kuil (Hindu))(Kuil (Gurdwara))
            $table->string('name_association')->unique();
            $table->string('office_phone')->nullable();

            $table->string('registration_type');                            //(MEMPUNYAI PENDAFTARAN SENDIRI)(MEMPUNYAI PENDAFTARAN DI BAWAH PERSATUAN INDUK/CAWANGAN)
            $table->string('name_association_main')->nullable();
            $table->string('registration_number')->unique();
            
            $table->text('address');
            $table->string('postcode');
            $table->string('district');
            $table->string('state')->default('Selangor');;                  //All rumah ibadat is in Selangor
            $table->string('pbt_area');

            $table->string('name_association_bank');
            $table->string('bank_name');
            $table->string('bank_account')->unique();


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
