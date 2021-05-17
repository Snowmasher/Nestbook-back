<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdAsociacionToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_asociacion')->references('id')->on('asociacions');
        });

        Schema::table('asociacions', function (Blueprint $table) {
            $table->foreign('id_mod')->references('id')->on('users');
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
            $table->dropForeign(['id_asociacion']);
        });

        Schema::table('asociacions', function (Blueprint $table) {
            $table->dropForeign(['id_mod']);
        });
    }
}
