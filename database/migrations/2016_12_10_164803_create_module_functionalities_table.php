<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleFunctionalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_functionalities', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('id_module')->unsigned();
            $table->foreign('id_module')->references('id')->on('modules');

            $table->string('functionality', 100);
            
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
        Schema::dropIfExists('module_functionalities');
    }
}
