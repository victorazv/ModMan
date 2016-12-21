<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdUserInBasicTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function ($table) {
            $table->integer('id_users')->unsigned()->nullable();
            $table->foreign('id_users')->references('id')->on('users');
        });

        Schema::table('modules', function ($table) {
            $table->integer('id_users')->unsigned()->nullable();
            $table->foreign('id_users')->references('id')->on('users');
        });

        Schema::table('systems', function ($table) {
            $table->integer('id_users')->unsigned()->nullable();
            $table->foreign('id_users')->references('id')->on('users');
        });

        Schema::table('profiles', function ($table) {
            $table->integer('id_users')->unsigned()->nullable();
            $table->foreign('id_users')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function ($table) {
            $table->dropForeign('clients_id_user_foreign');
            $table->dropColumn('id_users');
        });

        Schema::table('modules', function ($table) {
            $table->dropForeign('modules_id_user_foreign');
            $table->dropColumn('id_users');
        });

        Schema::table('systems', function ($table) {
            $table->dropForeign('systems_id_user_foreign');
            $table->dropColumn('id_users');
        });

        Schema::table('profiles', function ($table) {
            $table->dropForeign('profiles_id_user_foreign');
            $table->dropColumn('id_users');
        });
    }
}
