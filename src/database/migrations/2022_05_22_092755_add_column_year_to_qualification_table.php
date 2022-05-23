<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qualification', function (Blueprint $table) {
            $table->dateTime('year')->after('course_id');
        });

        Schema::table('qualification_total', function (Blueprint $table) {
            $table->dateTime('year')->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qualification', function (Blueprint $table) {
            $table->dropColumn('year');
        });

        Schema::table('qualification_total', function (Blueprint $table) {
            $table->dropColumn('year');
        });
    }
};
