<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientSystemModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_system_modules', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_client_system')->unsigned();
            $table->foreign('id_client_system')->references('id')->on('client_systems');

            $table->integer('id_module')->unsigned();
            $table->foreign('id_module')->references('id')->on('modules');

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
        Schema::dropIfExists('client_system_modules');
    }
}
