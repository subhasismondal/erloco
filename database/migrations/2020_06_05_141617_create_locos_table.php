<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('locono');
            $table->string('homeshed');
            $table->string('trainno');
            $table->string('source');
            $table->string('destination');
            $table->date('ddate');
            $table->date('idate');
            $table->string('inspection');
            $table->time('time');
            $table->string('enteredby');
            $table->string('division');
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
        Schema::dropIfExists('locos');
    }
}
