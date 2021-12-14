<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {

		$table->id();
		$table->integer('subject_id');
		$table->string('name',181);
		$table->integer('number');
		$table->integer('hrs');
		$table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('levels');
    }
}