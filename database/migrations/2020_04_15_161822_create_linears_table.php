<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linears', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tahun');
            $table->string('bulan');
            $table->unsignedInteger('kelurahan_id');
            $table->float('y')->nullable();
            $table->float('x')->nullable();
            $table->float('xy')->nullable();
            $table->float('xpangkat2')->nullable();
            $table->float('xpangkat2y')->nullable();
            $table->float('xpangkat4')->nullable();
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
        Schema::dropIfExists('linears');
    }
}
