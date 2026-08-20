<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFieldCertificateToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('certificate')->nullable()->after('phone_number');
        });

        Schema::table('jobs', function (Blueprint $table) {
            $table->string('certificate')->nullable()->after('language_level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('certificate');
        });

        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('certificate');
        });
    }
}
