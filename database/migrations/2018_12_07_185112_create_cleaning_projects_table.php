<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCleaningProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaning_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('house_id')->references('id')->on('houses');
            $table->integer('cleaner_id')->references('id')->on('cleaners');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->boolean('completed')->default(false);
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
        Schema::dropIfExists('cleaning_projects');
    }
}
