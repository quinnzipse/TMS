<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_card', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumInteger('tid');
            $table->timestamps();
            $table->timestamp('in');
            $table->timestamp('out');
            $table->integer('diff');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_card');
    }
}
