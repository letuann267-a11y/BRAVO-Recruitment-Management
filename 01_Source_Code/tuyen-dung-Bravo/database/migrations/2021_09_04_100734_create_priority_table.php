<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriorityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priority', function (Blueprint $table) {
            $table->id("priority_id");
            $table->unsignedBigInteger("job_id")->nullable();
            $table->integer("age")->nullable();
            $table->integer("gender")->nullable();
            $table->integer("category")->nullable();
            $table->integer("language")->nullable();
            $table->integer("certificate")->nullable();
            $table->integer("province_priority")->nullable();
            $table->integer("total")->nullable();
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('priority');
    }
}
