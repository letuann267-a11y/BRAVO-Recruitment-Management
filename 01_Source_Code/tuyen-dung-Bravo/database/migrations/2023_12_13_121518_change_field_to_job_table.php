<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFieldToJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->bigInteger('province_id')->unsigned()->nullable()->after('category_id');
            $table->integer('gender')->nullable()->after('province_id');
            $table->integer('startingAge')->nullable()->after('gender');
            $table->integer('endingAge')->nullable()->after('startingAge');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            //
        });
    }
}
