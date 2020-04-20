<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasilLinearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_linears', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kelurahan_id');
            $table->string('bulan')->nullable();
            $table->float('nilai_a')->nullable();
            $table->float('nilai_b')->nullable();
            $table->float('nilai_c')->nullable();
            $table->float('nilai')->nullable();
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
        Schema::dropIfExists('hasil_linears');
    }
}
