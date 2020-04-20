<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClusteringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clusterings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tahun');
            $table->string('bulan');
            $table->unsignedInteger('kelurahan_id');
            $table->float('c1')->nullable();
            $table->float('c2')->nullable();
            $table->float('c3')->nullable();
            $table->float('c4')->nullable();
            $table->float('jumlah')->nullable();
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
        Schema::dropIfExists('clusterings');
    }
}
