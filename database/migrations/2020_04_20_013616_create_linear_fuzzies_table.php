<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinearFuzziesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linear_fuzzies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tahun');
            $table->string('bulan');
            $table->unsignedInteger('kelurahan_id');
            $table->float('nilai_x');
            $table->string('clustering')->nullable();
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
        Schema::dropIfExists('linear_fuzzies');
    }
}
