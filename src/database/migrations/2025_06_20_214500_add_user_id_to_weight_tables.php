<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToWeightTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weight_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');
        });

        Schema::table('weight_target', function (Blueprint $table){
            $table->unsignedBigInteger('user_id')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weight_logs', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });

        Schema::table('weight_target', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
