<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csms', function (Blueprint $table) {
            $table->id();

            $table->string('intro_title')->nullable();
            $table->text('intro_content')->nullable();


            $table->string('upen_address')->nullable();
            $table->string('upen_email')->nullable();
            $table->string('upen_contact')->nullable();

            $table->string('yb1_name')->nullable();
            $table->string('yb1_address')->nullable();
            $table->string('yb1_email')->nullable();
            $table->string('yb1_contact')->nullable();

            $table->string('yb2_name')->nullable();
            $table->string('yb2_address')->nullable();
            $table->string('yb2_email')->nullable();
            $table->string('yb2_contact')->nullable();

            $table->string('yb3_name')->nullable();
            $table->string('yb3_address')->nullable();
            $table->string('yb3_email')->nullable();
            $table->string('yb3_contact')->nullable();

            $table->string('yb4_name')->nullable();
            $table->string('yb4_address')->nullable();
            $table->string('yb4_email')->nullable();
            $table->string('yb4_contact')->nullable();

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
        Schema::dropIfExists('csms');
    }
}
