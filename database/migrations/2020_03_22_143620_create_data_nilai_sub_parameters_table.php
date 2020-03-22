<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataNilaiSubParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_nilai_sub_parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kelurahan_id');
            $table->unsignedInteger('sub_parameter_id');
            $table->unsignedInteger('tahun_id');
            $table->unsignedInteger('bulan_id');
            $table->string('nilai');
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
        Schema::dropIfExists('data_nilai_sub_parameters');
    }
}
