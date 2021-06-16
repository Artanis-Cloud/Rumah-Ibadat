<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTujuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tujuans', function (Blueprint $table) {
            $table->id();                                                               //default

            $table->bigInteger('permohonan_id')->unsigned()->nullable();                //user id
            $table->foreign('permohonan_id')->references('id')->on('permohonans');      //user id

            $table->string('tujuan');                                                   //(1-Pendidikan Keagamaan)
                                                                                        //(2-Aktiviti Keagamaan)
                                                                                        //(3-Pembelian Peralatan Untuk Kelas Keagamaan)
                                                                                        //(4-Baik Pulih/Penyelenggaraan Bangunan)
                                                                                        //(5-Pemindahan/Pembinaan Baru Rumah Ibadat)
            
            $table->string('peruntukan')->default('0.00'); 
            $table->string('status')->default('0');                                     //(0- Tidak Lulus)(1- Lulus)(2- Semak Semula)

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
        Schema::dropIfExists('tujuans');
    }
}
