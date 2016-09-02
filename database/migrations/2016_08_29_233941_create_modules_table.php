<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_system')->nullable(false)->unsigned();
            $table->foreign('id_system')->references('id')->on('systems');

            $table->string('name', 100);

            $table->string('description');

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
        Schema::drop('modules');

        //$table->dropForeign('modules_system_id_foreign');
        //$table->dropColumn('system_id');

    }
}
