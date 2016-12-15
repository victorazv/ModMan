<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modules', function ($table) {
            $table->dropForeign('modules_id_system_foreign');
            $table->dropColumn('id_system');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modules', function ($table) {
            $table->integer('id_system')->nullable(false)->unsigned();
            $table->foreign('id_system')->references('id')->on('systems');
        });
    }
}
