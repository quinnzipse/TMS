<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('uid');
            $table->text('category');
            $table->date('start_date')->default(today());
            $table->date('end_date')->nullable();
            $table->decimal('priority');
            $table->text('title');
            $table->text('desc')->nullable();
            $table->mediumInteger('minutes')->default(0);
            $table->mediumInteger('est_minutes')->nullable();
            $table->text('flag')->nullable();
            $table->json('shared_with')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
}
