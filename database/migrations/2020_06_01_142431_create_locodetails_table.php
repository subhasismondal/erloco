<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocodetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locodetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('locono');
            $table->string('trainno');
            $table->string('source');
            $table->string('destination');
            $table->date('date');
            $table->time('time');
            $table->string('enteredby');
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
        Schema::dropIfExists('locodetails');
    }
}
