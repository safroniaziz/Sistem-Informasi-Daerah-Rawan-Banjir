<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToBulanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bulans', function (Blueprint $table) {
            $table->string('nm_bulan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bulans', function (Blueprint $table) {
            $table->dropColumn('tahun_id');
            $table->dropColumn('nm_bulan');
        });
    }
}
