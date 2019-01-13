<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCleanersHostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaners_hosts', function (Blueprint $table) {
            $table->integer('cleaner_id')->references('id')->on('cleaners');
            $table->integer('host_id')->references('id')->on('hosts');

            // Make the combo of these two collumns the primary ID
            $table->primary(['cleaner_id', 'host_id']);

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
        Schema::dropIfExists('cleaners_hosts');
    }
}
