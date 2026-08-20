<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index();//Kete bigInteger e kemi bere per tu pershtatur me $table->id te tabeles users per te bere te mundur onDelete('cascaden') qe kur te fshihet perdoruesi te fshihet postimi i tij automatikisht
            $table->text('title')->nullable()->index();
            $table->text('body')->nullable()->index();
            $table->integer('category_id')->nullable();
            $table->text('duties')->nullable()->index();
            $table->string('slug')->unique()->index();
            $table->string('address')->nullable();
            $table->string('remote')->nullable();
            $table->string('experience')->nullable();
            $table->string('startingDate')->nullable();
            $table->string('endingDate')->nullable();
            $table->string('job_type')->nullable();
            $table->text('price_type')->nullable();
            $table->text('price')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
