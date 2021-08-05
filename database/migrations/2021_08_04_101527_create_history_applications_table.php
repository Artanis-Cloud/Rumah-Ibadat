<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_applications', function (Blueprint $table) {
            $table->id();

            $table->string('tahun')->nullable();
            $table->string('rumah_ibadat')->nullable();
            $table->text('alamat')->nullable();
            $table->string('daerah')->nullable();
            $table->string('no_pendaftaran')->nullable();
            $table->string('sebab_permohonan')->nullable();
            $table->string('no_akaun')->nullable();
            $table->string('bank')->nullable();
            $table->string('jumlah_kelulusan')->nullable();

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
        Schema::dropIfExists('history_applications');
    }
}
