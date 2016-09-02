<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_systems', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id')->on('clients');

            $table->integer('id_system')->unsigned();
            $table->foreign('id_system')->references('id')->on('systems');

            $table->string('paid', 1);

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
        Schema::drop('client_systems');
    }
}
