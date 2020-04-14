<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurahHujansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curah_hujans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tahun');
            $table->string('bulan');
            $table->unsignedInteger('kelurahan_id');
            $table->integer('nilai');
            $table->integer('sub_parameter_id');
            $table->integer('nilai_skor');
            $table->string('nilai_fuzzy');
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
        Schema::dropIfExists('curah_hujans');
    }
}
