<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class addFieldKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_systems', function ($table) {
            $table->string('key', 30)->nullable();
        });

        Schema::table('system_modules', function ($table) {
            $table->string('key', 30)->nullable();
        });

        Schema::table('module_functionalities', function ($table) {
            $table->string('key', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_systems', function ($table) {
            $table->dropColumn('id_users');
        });

        Schema::table('system_modules', function ($table) {
            $table->dropColumn('id_users');
        });

        Schema::table('module_functionalities', function ($table) {
            $table->dropColumn('id_users');
        });
    }
}
