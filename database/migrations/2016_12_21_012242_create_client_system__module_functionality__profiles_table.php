<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientSystemModuleFunctionalityProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cli_sys_mod_func_profile', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('id_client_system')->unsigned();
            $table->foreign('id_client_system')->references('id')->on('client_systems');
            
            $table->integer('id_module_functionality')->unsigned();
            $table->foreign('id_module_functionality')->references('id')->on('module_functionalities');
        
            $table->integer('id_profile')->unsigned();
            $table->foreign('id_profile')->references('id')->on('profiles');

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
        Schema::dropIfExists('cli_sys_mod_func_profile');
    }
}
