<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();                                         //default

            //user-attribute
            $table->string('role')->default('2');                 //(0 = Super Admin) (1 = Admin) (2 = User)
            $table->string('status')->default('1');               //(1 = Active) (0 = Deactive)
            $table->string('is_firstime')->default('1');          //(1 = Firstimer) (0 = Not Firstimer)

            $table->string('name');
            $table->string('email')->unique();
            $table->string('ic_number')->unique();
            $table->string('mobile_phone')->unique();
            $table->string('password');

            $table->timestamp('email_verified_at')->nullable();  //default
            $table->rememberToken();                             //default
            $table->timestamps();                                //default

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
