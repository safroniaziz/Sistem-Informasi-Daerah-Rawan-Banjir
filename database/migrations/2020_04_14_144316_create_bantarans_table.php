<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBantaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bantarans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tahun');
            $table->string('bulan');
            $table->unsignedInteger('kelurahan_id');
            $table->string('m10')->nullable();
            $table->string('m20')->nullable();
            $table->string('m30')->nullable();
            $table->string('m40')->nullable();
            $table->string('m10_skor')->nullable();
            $table->string('m20_skor')->nullable();
            $table->string('m30_skor')->nullable();
            $table->string('m40_skor')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('nilai_fuzzy')->nullable();
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
        Schema::dropIfExists('bantarans');
    }
}
