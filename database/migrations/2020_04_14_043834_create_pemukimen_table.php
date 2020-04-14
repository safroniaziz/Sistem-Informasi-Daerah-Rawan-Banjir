<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemukimenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemukimen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tahun');
            $table->string('bulan')->nullable();
            $table->string('kelurahan_id');
            $table->string('persentase');
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
        Schema::dropIfExists('pemukimen');
    }
}
