<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned()->nullable();          //user id
            $table->foreign('user_id')->references('id')->on('users');      //user id

            $table->string('status')->default('1');                         //(0-Tidak Aktif)(1-Aktif)

            //role view
            $table->string('admin')->default('0');
            $table->string('upen')->default('0');
            $table->string('yb')->default('0');
            $table->string('exco')->default('0');
            $table->string('pemohon')->default('0');



            $table->text('title')->nullable();
            $table->text('content')->nullable();

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
        Schema::dropIfExists('announcements');
    }
}
