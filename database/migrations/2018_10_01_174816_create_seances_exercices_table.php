<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSeancesTable.
 */
class CreateSeancesExercicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances_exercices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_seances')->unsigned();
            $table->foreign('id_seances')->references('id')->on('seances');            
            $table->integer('id_exercices')->unsigned();
            $table->foreign('id_exercices')->references('id')->on('exercices');
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
        Schema::table('seances_exercices', function(Blueprint $table) {

            $table->dropForeign('seances_exercices_id_seances_foreign');

            $table->dropForeign('seances_exercices_id_exercices_foreign');

        });        
        Schema::dropIfExists('seances_exercices');
    }
}
