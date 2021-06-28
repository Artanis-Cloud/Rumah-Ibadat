<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeruntukansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peruntukans', function (Blueprint $table) {
            $table->id();

            //system
            $table->string('total_fund')->default('0.00');
            $table->string('current_fund')->default('0.00');
            $table->string('balance_fund')->default('0.00');

            //tokong
            $table->string('total_tokong')->default('0.00');
            $table->string('current_tokong')->default('0.00');
            $table->string('balance_tokong')->default('0.00');

            //kuil
            $table->string('total_kuil')->default('0.00');
            $table->string('current_kuil')->default('0.00');
            $table->string('balance_kuil')->default('0.00');

            //gurdwara
            $table->string('total_gurdwara')->default('0.00');
            $table->string('current_gurdwara')->default('0.00');
            $table->string('balance_gurdwara')->default('0.00');

            //gereja
            $table->string('total_gereja')->default('0.00');
            $table->string('current_gereja')->default('0.00');
            $table->string('balance_gereja')->default('0.00');

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
        Schema::dropIfExists('peruntukans');
    }
}
